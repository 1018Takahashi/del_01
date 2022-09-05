@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')


        <h1>Blog Name</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            
            <input type="hidden" name="post[user_id]" value="{{ Auth::id() }}">
            
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="title" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            
            <div class="img">
                <h2>Photo</h2>
                <input type="file" name="image">
            </div>
            
            <div class="category">
                <h2>Category</h2>
                <select name="post[category_id]">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="place">
                <h2>Place</h2>
                <select name="post[place_id]">
                    @foreach($places as $place)
                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="address">
                <h2>Address</h2>
                <textarea name="post[address]" placeholder="address">{{ old('post.address') }}</textarea>
                <p class="title__error" style="color:red">{{ $errors->first('post.address') }}</p>
            </div>
            
            <div class="camera">
                <h2>Camera</h2>
                <input type="text" name="post[camera]" placeholder="camera" value="{{ old('post.camera') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.camera') }}</p>
            </div>
            
            <div class="lens">
                <h2>Lens</h2>
                <input type="text" name="post[lens]" placeholder="lens" value="{{ old('post.lens') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.lens') }}</p>
            </div>
            
            <div class="f">
                <h2>F-Value</h2>
                <input type="text" name="post[f]" placeholder="f-value" value="{{ old('post.f') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.f') }}</p>
            </div>
            
            <div class="ss">
                <h2>Shutter Speed</h2>
                <input type="text" name="post[ss]" placeholder="shutter speed" value="{{ old('post.ss') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.ss') }}</p>
            </div>
            
            <div class="iso">
                <h2>ISO Sensitivity</h2>
                <input type="text" name="post[iso]" placeholder="ISO sensitivity" value="{{ old('post.iso') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.iso') }}</p>
            </div>
            
            <input type="submit" value="保存">
            
        </form>
        
        <div class="back">[<a href="/">back</a>]</div>
        
    
@endsection