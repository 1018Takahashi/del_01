@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<body class="bg-secondary bg-opacity-25">
    <div class="bg-dark">
        <div class="w-100" style="height:3%;"></div>
        
        <div class="d-flex w-100" style="margin-bottom:1%;">
            @if ($user_id == $post->user_id)
            <div class="edit" style="position:relative; left: 8%;;">
                <button class="btn btn-outline-success" onclick="location.href='/posts/{{ $post->id }}/edit'">edit</button>
            </div>
        
            <div class="delete" style="position:relative; left:11.5%;">
                <form action="/posts/{{ $post->id }}" id="form_delete" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger" type = "button" onclick = "return deletePost(this)">delete</button> 
                </form>
            </div>
            
            <script>
                function deletePost(e){
                    'use strict';
                    if(confirm("削除すると復元できません。\n本当に削除しますか？")){
                        document.getElementById("form_delete").submit();
                    }
                }
            </script>
            @endif
        </div>
        
        <h1 class="text-light title" style="position:relative; left:6%;">{{ $post->title }}</h1>
        
        <div class="show-body row">
            <div class="show-text col-md-2">
                <div id="user_name" class="show-detail">
                    <p>ユーザー:</p>
                    <a class="text-light" href="/users/{{ $post->user->id }}"><h4>{{ $post->user->name }}</h4></a>
                </div>
                <div id="category" class="show-detail">
                    <p>ジャンル:</p>
                    <p>
                        @foreach($post->category as $category)  
                        <a class="text-light" href="/categories/{{ $category->id }}">{{ $category->name }}</a><br>
                        @endforeach
                    </p>
                </div>
                <div id="Address" class="show-detail">
                    <p>撮影場所</p>
                    <p><a class="text-light" href="/places/{{ $post->place->id }}">{{ $post->place->name }}</a>{{ $post->address }}</p>
                </div>
                <div id="Camera" class="show-detail">
                    <p>モデル:</p>
                    @if (isset($post->camera) == True)
                    <p>{{ $post->camera }}</p>
                    @else
                    <br>
                    @endif
                </div>
                <div id="Lens" class="show-detail">
                    <p>レンズ:</p>
                    @if (isset($post->lens) == True)
                    <p>{{ $post->lens }}</p>
                    @else
                    <br>
                    @endif
                </div>
            </div>
            
            <div class="show-center col-md-8">
                <a href="{{ $post->img }}" data-lightbox="abc" data-title="写真拡大">
                    <img src="{{ $post->img }}" alt="写真">
　　　　　　　　</a>
            </div>
            
            <div class="show-text col-md-2">
                
                <div id="f_length" class="show-detail" height="20%">
                    <p>焦点距離:</p>
                    @if (isset($post->f_length) == True)
                    <p>{{ $post->f_length }}</p>
                    @else
                    <br>
                    @endif
                </div>
                <div id="f" class="show-detail" height="10%">
                    <p>F値：</p>
                    @if (isset($post->f) == True)
                    <p>{{ $post->f }}</p>
                    @else
                    <br>
                    @endif
                </div>
                <div id="ss" class="show-detail" height="10%">
                    <p>シャッタースピード[s]:</p>
                    @if (isset($post->ss) == True)
                    <p>{{ $post->ss }}</p>
                    @else
                    <br>
                    @endif
                </div>
                <div id="iso" class="show-detail" height="10%">
                    <p>ISO感度:</p>
                    @if (isset($post->iso) == True)
                    <p>{{ $post->iso }}</p>
                    @else
                    <br>
                    @endif
                </div>
                <div id="filmed_at" class="show-detail" height="10%">
                    <p>撮影日:</p>
                    @if (isset($post->filmed_at) == True)
                    <p>{{ $post->filmed_at}}</p>  
                    @else
                    <br>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="comment-map row">
            <div class="col-md-2"></div>
            <div class="Comment col-md-4">
                <p>comment:</p>
                @if (isset($post->comment) == True)
                <p>{{ $post->comment }}</p>
                @else
                <br>
                @endif
            </div>
            <div class="map col-md-4">
                <p>位置情報</p>
                @if (isset($post->lat) == True)
                <iframe src="https://maps.google.co.jp/maps?output=embed&q={{  $post->lat }} , {{ $post->lng }}"></iframe>
                @endif
            </div>
            <div class="col-md-2"></div>
        </div>
        <div style="height:3%;"></div>
    </div>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
　　<script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
　　<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
　　
</body>
@endsection


