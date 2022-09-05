<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Place;
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
        $user_id = Auth::id();
        return view('posts/show')->with([
            'post' => $post,
            'user_id' => $user_id,
            ]);
    }
    
    public function store(Post $post, PostRequest $request)
    {
        $img = $request->file('image');
        $path = Storage::disk('s3')->putFile('deliverable-creation', $img, 'public');
        $post->img = Storage::disk('s3')->url($path);
        
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
        
    }
    
    //投稿作成画面のcategories,placesデータ取得
    public function create(Category $category, Place $place)
    {
        return view('posts/create')->with([
            'categories' => $category->get(),
            'places' => $place->get(),
            ]);
    }
    
    
    //投稿編集画面表示
    public function edit(Post $post)
    {
        $test = 1;
        dd($test);
        return view('posts/edit')->with(['post' => $post]);
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
        $post->delete();
        return redirect('/');
    }
}
