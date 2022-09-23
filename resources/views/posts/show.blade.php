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
        <h1 class="user_name">
            <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>
        </h1>
        
        <h1 class="title">
            <p>{{ $post->title }}</p>
        </h1>
        
        <div class="text-center">
            <img src="{{ $post->img }}" width="700px" height="700px" style="object-fit: contain;">
        </div>
        
        <h4 class='category'>
        @foreach($post->category as $category)  
        <a href="/categories/{{ $category->id }}">{{ $category->name }}</a>
        @endforeach
        </h4>
        
        <div class="body">
            @if (isset($post->comment) == True)
            <div class="Comment">
                <h3>comment</h3>
                <p>{{ $post->comment }}</p>    
            </div>
            @endif
            
            <div class="Address">
                <h3>address</h3>
                <a href="/places/{{ $post->place->id }}">{{ $post->place->name }}</a>
                <p>{{ $post->address }}</p>    
            </div>
            
            @if (isset($post->camera) == True)
            <div class="Camera">
                <h3>camera</h3>
                <p>{{ $post->camera }}</p>    
            </div>
            @endif
            
            @if (isset($post->lens) == True)
            <div class="Lens">
                <h3>Lens</h3>
                <p>{{ $post->lens }}</p>    
            </div>
            @endif
            
            @if (isset($post->f_length) == True)
            <div class="f_length">
                <h3>FocalLength</h3>
                <p>{{ $post->f_length }}</p>    
            </div>
            @endif
            
            @if (isset($post->f) == True)
            <div class="f">
                <h3>F-Value</h3>
                <p>{{ $post->f }}</p>    
            </div>
            @endif
            
            @if (isset($post->ss) == True)
            <div class="ss">
                <h3>Shutter Speed</h3>
                <p>{{ $post->ss }}</p>    
            </div>
            @endif
            
            @if (isset($post->iso) == True)
            <div class="iso">
                <h3>ISO Seneitivity</h3>
                <p>{{ $post->iso }}</p>    
            </div>
            @endif
            
            @if (isset($post->access) == True)
            <div class="access">
                <h3>Access Count</h3>
                <p>{{ $post->access }}</p>    
            </div>
            @endif
            
            @if (isset($post->month->id) == True)
            <div class="Month">
                <h3>Month</h3>
                <a href="/months/{{ $post->month->id }}">{{ $post->month->name }}</a>
            </div>
            @endif
            
            @if (isset($post->filmed_at) == True)
            <div class="filmed_at">
                <h3>Filmed At</h3>
                <p>{{ $post->filmed_at}}</p>  
            </div>
            @endif
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
            <a href="/">HOME</a>
        </div>
    </body>
</html>
@endsection