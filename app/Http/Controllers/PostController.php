<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Place;
use App\Month;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //投稿一覧画面のpostデータ取得関数
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    //投稿詳細画面のpostデータ取得
    public function show(Post $post)
    {
        $post->access+=1;
        $post->save();
        
        $user_id = Auth::id();
        return view('posts/show')->with([
            'post' => $post,
            'user_id' => $user_id,
            ]);
    }
    
    //投稿作成画面のcategories,placesデータ取得
    public function create(Category $category, Place $place)
    {
        return view('posts/create')->with([
            'categories' => $category->get(),
            'places' => $place->get(),
            ]);
    }
    
    //作成された投稿内容をデータベースに保存
    public function store(Post $post, PostRequest $request)
    {
        //アップロードした画像ファイルを格納
        $img = $request->file('image');
        
        try{
            //画像のEXIFデータを取得
            $exif = exif_read_data($img);
            
            //各データを$postへ代入
            $post->camera = $exif['Model'];
        
            $post->lens = $exif['UndefinedTag:0xA434'];
        
            $f_length = (int) $exif['FocalLength'];
            $post->f_length = (string) $f_length;
        
            $f_int = explode("/", $exif['FNumber']);
            $f = (double)$f_int[0] / (double)$f_int[1];
            $post->f = (string) $f;
        
            $post->ss = $exif['ExposureTime'];
        
            $post->iso = $exif['ISOSpeedRatings'];
        
            //$exifの日付データを取得
            $date = $exif['DateTimeOriginal'];
            //月のみを数字として取得
            $month_int = (int) mb_substr($date, 5, 2);
            //文字列に変換
            $month_str = (string) $month_int;
            //各データを$postへ代入
            $post->month_id = $month_str;
            $post->filmed_at = $date;
        } catch (\Exception $e) {
        }
        
        //アップロードした画像をs3に保存
        $path = Storage::disk('s3')->putFile('deliverable-creation', $img, 'public');
        //s3の画像パスを$postへ代入
        $post->img = Storage::disk('s3')->url($path);
        
        
        $input_posts = $request['post'];
        $input_categories = $request->categories_array;
        
        $post->fill($input_posts)->save();
        $post->category()->attach($input_categories);
        
        return redirect('/posts/' . $post->id);
    }
    
    //投稿編集画面表示
    public function edit(Post $post, Category $category, Place $place)
    {
        return view('posts/edit')->with([
            'post' => $post,
            'categories' => $category->get(),
            'places' => $place->get(),
            ]);
    }
    
    //投稿データ編集の保存
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    //投稿削除
    public function delete(Post $post)
    {
        Storage::disk('s3')->delete($post->img);
        $post->delete();
        return redirect('/');
    }
}
