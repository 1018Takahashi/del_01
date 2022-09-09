@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="title">Edit Display</h1>
        
        <div class="text-center">
            <img src="{{ $post->img }}" class="w-75">
        </div>
        
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class='content__title'>
                    <h2>Title</h2>
                    <input type='text' name='post[title]' value="{{ $post->title }}">
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                
                <div class="category">
                    <h2>Category</h2>
                    @foreach($categories as $category)
                    <label>
                        <input type="checkbox" value="{{ $category->id }}" name="categories_array[]">
                        {{$category->name}}
                        </input>
                    </label>
                    @endforeach
                </div>
                
                <div class='content__comment'>
                    <h2>Comment</h2>
                    <textarea name="post[comment]" placeholder="comment">{{ $post->comment }}</textarea>
                </div>
            　　
                <div class='content__address'>
                    <h2>Address</h2>
                    <textarea name="post[address]" placeholder="address">{{ $post->address }}</textarea>
                    <p class="title__error" style="color:red">{{ $errors->first('post.address') }}</p>
                </div>
                
                <div class="place">
                    <h2>Place</h2>
                    <select name="post[place_id]">
                        @foreach($places as $place)
                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                        @endforeach
                    </select>
                </div>
            　　
                <input type="submit" value="保存">
            </form>
        </div>
        
        <div class="back">[<a href="/">back</a>]</div>
        
    </body>
</html>
@endsection