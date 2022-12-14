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
    <body class="bg-secondary bg-opacity-25">
        <div class="bg-dark">
            
            <div style="height: 3%;"></div>
        
            <h1>Blog Name</h1>
            <!--検索-->
            <form method="GET" action="/searches/search">
                <div class="">
                    <div class="search_bar">
                        <input id="search_text" class="" type="search" placeholder="キーワードを入力" name="search">
                        <button class="btn btn-outline-success h-100" type="submit" style="width: 11%; color: white; background-color: #0080ff"><i class="fas fa-search"></i> 検索</button>
                    </div>
                </div>
            </form>
            
            <!--投稿一覧-->
            <div class='card-group'　style="padding: 25px;">
                <div class="card bg-secondary bg-opacity-25" style="padding:25px;">
                    <img src="/image/search/category.jpg" class="card-img h-100 w-100" style="filter: brightness(60%); object-fit: cover">
                    <div class="card-img-overlay">
                        <p class="text-center"><a href="/categories" class="" style="height: 50%; font-size: 30px; color:#EEEEEE;　font-family:sans-serif">カテゴリーで検索</a></p>
                    </div>
                </div>
                <div class="card bg-secondary bg-opacity-25" style="padding: 25px;">
                    <img src="/image/search/place.jpg" class="card-img h-100 w-100" style="filter: brightness(60%); object-fit: cover">
                    <div class="card-img-overlay">
                        <p class="text-center"><a href="/places" class="card-title">場所</a></p>
                    </div>
                </div>
                <div class="card bg-secondary bg-opacity-25" style="padding: 25px; object-fit: cover">
                    <img src="/image/search/month.jpg" class="card-img h-100 w-100" style="filter: brightness(60%); object-fit: cover">
                    <div class="card-img-overlay">
                        <p class="text-center"><a href="/months" class="card-title">季節</a></p>
                    </div>
                </div>
            </div>
            
            <div class="footer">
                <a href="/">HOME</a>
            </div>
            
        </div>
        
    </body>
</html>
@endsection