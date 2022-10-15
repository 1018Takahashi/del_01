@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
    <body class="bg-secondary bg-opacity-25">
        <div class="bg-dark">
            <h1 class="text-light"  style="padding:2% 0 0 2%">{{ $place->name }}</h1>
            
            <form method="GET" action="/searches/search">
                <div class="search_bar">
                    <input id="search_text" class="" type="search" placeholder="キーワードを入力" name="search" value="@if(isset($search)) {{ $search }} @endif">
                    <button class="btn btn-primary search_btn" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
            
            <div class="bar-graph-content m-5">
                <h2 class="graph-title text-center text-light m-2">月ごとの枚数グラフ</h2>
                <div class="bar-graph-wrap vertical" style="max-width: 90%;">
                    @foreach ($months as $month) 
                    <div class="graph color" style="width: 30px; left: {{ $month[3] }}%; height: {{ $month[2] }}%; background: {{ $month[4] }};">
                        <span class="name">{{ $month[0] }}月</span>
                        <span class="number">{{ $month[1] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            
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
        </div>
    </body>
</html>
@endsection