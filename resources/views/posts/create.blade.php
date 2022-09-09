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
            
            <div class="comment">
                <h2>Comment</h2>
                <textarea name="post[comment]" placeholder="comment">{{ old('post.comment') }}</textarea>
                <p class="title__error" style="color:red">{{ $errors->first('post.comment') }}</p>
            </div>
            
            <div class="category">
                <h2>Category</h2>
                @foreach($categories as $category)
                <label>
                    <input type="checkbox" value="{{ $category->id }}" name="categories_array[]">
                        {{$category->name}}
                    </input>
                </label>
                @endforeach
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
            
            <input type="submit" value="保存">
            
        </form>
        
        <div class="back">[<a href="/">back</a>]</div>
        
    
@endsection