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
        <h1 class="title">Edit Display</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>Title</h2>
                    <input type='text' name='post[title]' value="{{ $post->title }}">
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                <div class='content__address'>
                    <h2>Address</h2>
                    <input type='text' name='post[address]' value="{{ $post->address }}">
                    <p class="body__error" style="color:red">{{ $errors->first('post.address') }}</p>
                </div>
                <div class='content__camera'>
                    <h2>Camera</h2>
                    <input type='text' name='post[camera]' value="{{ $post->camera }}">
                    <p class="title__error" style="color:red">{{ $errors->first('post.camera') }}</p>
                </div>
                <div class='content__lens'>
                    <h2>Lens</h2>
                    <input type='text' name='post[lens]' value="{{ $post->lens }}">
                    <p class="title__error" style="color:red">{{ $errors->first('post.lens') }}</p>
                </div>
                <div class='content__f'>
                    <h2>F-Value</h2>
                    <input type='text' name='post[f]' value="{{ $post->f }}">
                    <p class="title__error" style="color:red">{{ $errors->first('post.f') }}</p>
                </div>
                <div class='content__ss'>
                    <h2>Shutter Speed</h2>
                    <input type='text' name='post[ss]' value="{{ $post->ss }}">
                    <p class="title__error" style="color:red">{{ $errors->first('post.ss') }}</p>
                </div>
                <div class='content__iso'>
                    <h2>ISO Sensitivity</h2>
                    <input type='text' name='post[iso]' value="{{ $post->iso }}">
                    <p class="title__error" style="color:red">{{ $errors->first('post.iso') }}</p>
                <input type="submit" value="保存">
            </form>
        </div>
    </body>
</html>
@endsection