@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
    <body class="bg-secondary bg-opacity-25">
        
        <div class="bg-dark">
            
            <div style="height: 5%;"></div>
            
            <!--検索-->
            <form method="GET" action="/searches/search">
                <div>
                    <div class="search_bar">
                        <input id="search_text" class="" type="search" placeholder="キーワードを入力" name="search" value="{{ $month->name }}">
                        <button class="btn btn-primary search_btn" type="submit"><i class="fas fa-search"></i> 検索</button>
                    </div>
                </div>
            </form>
        
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
        
            <div class="footer">
                <a href="/categories">BACK</a>
            </div>
        
            <!--ページネーション-->
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
        </div>
    </body>
@endsection