@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<body class="bg-secondary bg-opacity-25">
    <div class="bg-dark">
        <br>
        <h1 class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">編集画面</h1>
        
        <div class="row w-100">
            <div class="col-md-1"></div>
            
            <div class="col-md-5">
                <img src="{{ $post->img }}" class="w-100 h-75" style="object-fit: contain;">
            </div>
            
            <form class="col-md-5" action="/posts/{{ $post->id }}" method="POST" style="">
                @csrf
                @method('PUT')
                
                <div class='content__title'>
                    <h2 class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">タイトル</h2>
                    <input class="w-75　imput-bar" type='text' name='post[title]' value="{{ $post->title }}">
                    @if(mb_strlen($errors->first('post.title')) >> 5)
                    <p class="title__error" style="color:red">タイトルを入力してください</p>
                    @endif
                </div>
                
                <br>
                
                <div class='content__comment'>
                    <h2 class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">コメント</h2>
                    <textarea class="w-75　imput-bar" name="post[comment]" placeholder="comment">{{ $post->comment }}</textarea>
                </div>
                
                <br>
            　　
                <div class="category" >
                    <h2 class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">カテゴリー</h2>
                    @foreach($categories as $category)
                    <label class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">
                        <input type="checkbox" value="{{ $category->id }}" name="categories_array[]" {{ $post->category->contains($category) ? 'checked' : '' }}>
                            {{$category->name}}
                        </input>
                    </label>
                    @endforeach
                    @if(mb_strlen($errors->first('categories_array.0')) >> 5)
                        <p class="categories__error" style="color:red">カテゴリーを選択してください</p>
                    @endif
                </div>
                
                <br>
                
            　　<div class="place">
                    <h2 class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">都道府県</h2>
                    <select name="post[place_id]">
                        @foreach($places as $place)
                        <option value="{{ $place->id }}" @if ($place->id == $post->place->id) selected @endif>
                            {{ $place->name }}
                        </option>
                        @endforeach
                        @if(mb_strlen($errors->first('post.place_id')) >> 5)
                        <p class="places__error" style="color:red">都道府県を選択してください</p>
                        @endif
                    </select>
                </div>
                
                <br>
                
                <div class='content__address'>
                    <h2 class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">市区町村</h2>
                    <textarea class="w-75　imput-bar" name="post[address]" placeholder="address">{{ $post->address }}</textarea>
                    @if(mb_strlen($errors->first('post.address')) >> 5)
                        <p class="address__error" style="color:red">市区町村を入力してください</p>
                    @endif
                </div>
                
                <br>
                
                <input class="btn btn-lg btn-primary" type="submit" value="投稿"　style="position:relative; left:85%; margin-bottom:3%">
                
                <br>
                
            </form>
        </div>
    </div>
</body>
@endsection