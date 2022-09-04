@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    
    
    <body>
        <h1 class="title">
            <p>{{ $post->title }}</p>
        </h1>
        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        <div class="body">
            <div class="Adress">
                <h3>adress</h3>
                <a href="/places/{{ $post->place->id }}">{{ $post->place->name }}</a>
                <p>{{ $post->adress }}</p>    
            </div>
            <div class="Camera">
                <h3>camera</h3>
                <p>{{ $post->camera }}</p>    
            </div>
            <div class="Lens">
                <h3>Lens</h3>
                <p>{{ $post->lens }}</p>    
            </div>
            <div class="f">
                <h3>F-Value</h3>
                <p>{{ $post->f }}</p>    
            </div>
            <div class="ss">
                <h3>Shutter Speed</h3>
                <p>{{ $post->ss }}</p>    
            </div>
            <div class="iso">
                <h3>ISO Seneitivity</h3>
                <p>{{ $post->iso }}</p>    
            </div>
            <div class="iso">
                <h3>Updated At</h3>
                <p class = "updated_at">{{ $post->updated_at}}</p>  
            </div>
        </div>
        
        @if ($user_id == $post->user_id)
            <div class="edit">
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
            </div>
        
            <div class="delete">
                <form action="/posts/{{ $post->id }}" id="form_delete" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type = "button" onclick = "return deletePost(this)">delete</button> 
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
            
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
@endsection