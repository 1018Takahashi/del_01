@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

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
                
            <!--ページネーション-->
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
        </div>
    </body>
</html>
@endsection