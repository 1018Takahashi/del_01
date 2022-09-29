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
            
            //文字列の分数を少数に変換
            function str_double($exif_f){
                $f_str = explode("/", $exif_f);
                $f = (double)$f_str[0] / (double)$f_str[1];
                return $f;
            }
            
            //各データを$postへ代入
            $post->camera = $exif['Model'];
        
            $post->lens = $exif['UndefinedTag:0xA434'];
            
            $post->f_length = str_double($exif['FocalLength']);
        
            $post->f = str_double($exif['FNumber']);
        
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
        
        try{
            function convert_float($str)
            {
                $ary = explode('/', $str);
                return ( isset($ary[1]) ) ? ($ary[0]/$ary[1]) : $ary ;
            }
            
            function convert_decimal($ref, $fig_60)
            {
                $fig = convert_float( $fig_60[0] ) + ( convert_float($fig_60[1])/60 ) + ( convert_float($fig_60[2])/3600 ) ;
                return ( $ref=='S' || $ref=='W' ) ? ( $fig * -1 ) : $fig ;
            }
            
            $exif = exif_read_data($img);
            $exif_lat_ref = $exif["GPSLatitudeRef"];
            $exif_lat = $exif["GPSLatitude"];
            $exif_lng_ref = $exif["GPSLongitudeRef"];
            $exif_lng = $exif["GPSLongitude"];
            
            $post->lat = convert_decimal($exif_lat_ref, $exif_lat);
            $post->lng = convert_decimal($exif_lng_ref, $exif_lng);
            
        }catch (\Exception $e) {
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
        $input_posts = $request['post'];
        $input_categories = $request->categories_array;
        
        $post->fill($input_posts)->save();
        $post->category()->sync($input_categories);
        
        return redirect('/posts/' . $post->id);
    }
    
    //投稿削除
    public function delete(Post $post)
    {
        $img_path = $post->img;
        $path = str_replace('https://photo-backet.s3.ap-northeast-1.amazonaws.com', '', $img_path);
        Storage::disk('s3')->delete($path);
        $post->category()->detach();
        $post->delete($post->id);
        
        return redirect('/');
    }
    
    public function searchIndex(Post $post){
        return view('searches.index');
    }
    
    //検索画面
    public function search(Post $post, Request $request)
    {
        $search = $request->input('search');
        $posts_paginate = $post->paginate(15);
        $query = $post->query();
        
        if (isset($search)==True)
        {
            $spaceConversion = mb_convert_kana($search, 's');
            $wordArraySearched = preg_split('/[\s]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            
            foreach($wordArraySearched as $value){
                $query->where('title', 'like', "%$value%")
                      ->orWhere('comment', 'like', "%$value%")
                      ->orWhere('address', 'like', "%$value%");
            }
            $posts_paginate = $query->paginate(15);
            
            //検索ワードに引っかかる投稿を取得する
            $posts_get = $post->get();
            $posts_get = $query->get();
            //検索ワードに引っかかる投稿の数を取得する
            $all_number = count($posts_get);
            
            //月ごとの枚数をカウントするための配列
            $month_count = [
                [1, 0, 0, 4, "#00ffff"],
                [2, 0, 0, 12, "#8000ff"],
                [3, 0, 0, 20, "#ff00ff"],
                [4, 0, 0, 28, "#ff0080"],
                [5, 0, 0, 36, "#ff0000"],
                [6, 0, 0, 44, "#00ff80"],
                [7, 0, 0, 52, "#00ff00"],
                [8, 0, 0, 60, "#80ff00"],
                [9, 0, 0, 68, "#ffff00"],
                [10, 0, 0, 76, "#ff8000"],
                [11, 0, 0, 84, "#0080ff"],
                [12, 0, 0, 92, "#0000ff"],
                ];
            
            //焦点距離ごとの枚数をカウントするための配列
            $f_count = [
                ["広角(~35mm)", 0, 0, 8, "#00CC00"],
                ["標準(~100mm)", 0, 0, 43, "#00AA00"],
                ["望遠(100mm~)", 0, 0, 78, "#008800"],
                ];
            
            //検索ワードに引っかかる全ての投稿をループさせる
            foreach($posts_get as $post_get){
                try{
                    //月ごとの枚数をカウント
                    $month_id = $post_get->month_id;
                    $month_count[((int)$month_id)-1][1]++;
                    $month_count[((int)$month_id)-1][2] += 100/$all_number;
                    
                    //焦点距離ごとの枚数をカウント
                    $f_length = $post_get->f_length;
                    if($f_length <= 35){
                        $f_count[0][1]++;
                        $f_count[0][2] += 100/$all_number;
                    }elseif(35 < $f_length and $f_length <= 100){
                        $f_count[1][1]++;
                        $f_count[1][2] += 100/$all_number;
                    }elseif(100 < $f_length){
                        $f_count[2][1]++;
                        $f_count[2][2] += 100/$all_number;
                    }
                }catch(\Exception $e){
                }
            }
            
            return view('searches.search')->with([
            'posts' => $posts_paginate,
            'search' => $search,
            'months' => $month_count,
            'f_lengths' => $f_count,
            ]);
        } else {
            return view('searches.index');
        }
    }
}
