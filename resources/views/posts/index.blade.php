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
            
            <div style="height: 5%;"></div>
            
            <!--test-->
            <a href="/test">test</a>
            
            <!--検索-->
            <form method="GET" action="/searches/search">
                <div>
                    <div class="search_bar">
                        <input id="search_text" class="" type="search" placeholder="キーワードを入力" name="search">
                        <button class="btn btn-primary search_btn" type="submit"><i class="fas fa-search"></i> 検索</button>
                    </div>
                </div>
            </form>
            
            
                
                <!--投稿一覧-->
            <div class="row w-100">
                <div class='photos col-md-10'>
                    <div style="position:relative; left:8%;">
                        @foreach ($posts as $post)
                        <a href="/posts/{{ $post->id }}">
                            <img src="{{ $post->img }}" class='photo'>
                        </a>
                        @endforeach
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class='rankings bg-white w-100'>
                        <h3 class="ranking-name"><i class="fas fa-chess-king" style="color: #FFD700;"></i></h3>
                        <a href="/posts/{{ $rankings[0]->id }}">
                            <img src="{{ $rankings[0]->img }}" class="ranking">
                        </a>
                        
                        <h3 class="ranking-name"><i class="fas fa-chess-king" style="color: silver;"></i></h3>
                        <a href="/posts/{{ $rankings[1]->id }}">
                            <img src="{{ $rankings[1]->img }}" class="ranking">
                        </a>
                        
                        <h3 class="ranking-name"><i class="fas fa-chess-king" style="color: #8B4513;"></i></h3>
                        <a href="/posts/{{ $rankings[2]->id }}">
                            <img src="{{ $rankings[2]->img }}" class="ranking">
                        </a>
                    </div>
                </div>
            </div>
                
            <!--ページネーション-->
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
        </div>
    </body>
</html>
@endsection