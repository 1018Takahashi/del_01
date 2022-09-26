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
        <div class='photos'>
            @foreach ($posts as $post)
            <a href="/posts/{{ $post->id }}">
                <img src="{{ $post->img }}" class='photo'>
            </a>
            @endforeach
        </div>
        
        <div class="footer">
            <a href="/">HOME</a>
        </div>
        
        <!--ページネーション-->
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
@endsection