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
        <div class=''>
            @foreach ($categories as $category)
            <a href="/categories/{{ $category->id }}">
                <p>{{ $category->name }}</p>
            </a>
            @endforeach
        </div>
        
        <div class="footer">
            <a href="/searches">BACK</a>
        </div>
    </body>
</html>
@endsection