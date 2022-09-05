@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <!--投稿作成-->
        <p class = "create">[<a href='/posts/create'>create</a>]</p>
        
        <!--投稿一覧-->
        <div class='card-columns'>
            @foreach ($posts as $post)
            <div class="card">
                <div class="" alt="">
                    <img src="{{ $post->img }}" class="card-img-top">
                </div>
                <div class='card-img-overlay'>
                    <h2 class='card-title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <div class="card-text">
                        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                        <a href="/places/{{ $post->place->id }}">{{ $post->place->name }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!--ページネーション-->
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
@endsection