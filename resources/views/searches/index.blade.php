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
        <!--検索-->
        <form method="GET" action="/searches/search">
            <input type="search" placeholder="キーワードを入力" name="search">
            <button type="submit">検索</button>
            <button>
                <a href="/searches" class="text-white">クリア</a>
            </button>
        </form>
        
        <!--投稿一覧-->
        <div class='card-group'　style="padding: 25px;">
            <div class="card" style="padding: 25px;">
                <img src="http://placehold.jp/318x250.png" class="card-img">
                <div class="card-img-overlay">
                    <p class="text-center"><a href="/categories" class="card-title">カテゴリー</a></p>
                </div>
            </div>
            <div class="card" style="padding: 25px;">
                <img src="http://placehold.jp/318x250.png" class="card-img">
                <div class="card-img-overlay">
                    <p class="text-center"><a href="/places" class="card-title">場所</a></p>
                </div>
            </div>
            <div class="card" style="padding: 25px;">
                <img src="http://placehold.jp/318x250.png" class="card-img">
                <div class="card-img-overlay">
                    <p class="text-center"><a href="/months" class="card-title">季節</a></p>
                </div>
            </div>
        </div>
        
        <div class="footer">
            <a href="/">HOME</a>
        </div>
    </body>
</html>
@endsection