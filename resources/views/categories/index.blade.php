@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

    <body class="bg-secondary bg-opacity-25">
        <div class="bg-dark">
            
            <h1 class="text-light"  style="padding:2% 0 0 2%; text-shadow: 2px 2px 2px #808080;">{{ $category->name }}</h1>
            
            <!--検索-->
            <form method="GET" action="/searches/search">
                <div>
                    <div class="search_bar">
                        <input id="search_text" class="" type="search" placeholder="キーワードを入力" name="search">
                        <button class="btn btn-primary search_btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
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
        
            <div class="bar-graph-content m-5">
                <h2 class="graph-title text-center text-light m-2 ">焦点距離の枚数グラフ</h2>
                <div class="bar-graph-wrap vertical" style="max-width: 40%;">
                    @foreach ($f_lengths as $f_length) 
                    <div class="graph color" style="width: 60px; left: {{ $f_length[3] }}%; height: {{ $f_length[2] }}%; background: {{ $f_length[4] }};">
                        <span class="name">{{ $f_length[0] }}</span>
                        <span class="number">{{ $f_length[1] }}</span>
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
        
            <!--ページネーション-->
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
        </div>
    </body>
@endsection