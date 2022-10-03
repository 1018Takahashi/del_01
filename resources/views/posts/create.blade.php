@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')


        <h1>投稿作成画面</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            
            <input type="hidden" name="post[user_id]" value="{{ Auth::id() }}">
            
            <div class="row h-100">
                
                <div class="col-md-1"></div>
                
                <div class="col-md-5">
                    <div class="img">
                    <h2>Image</h2>
                    <input type="file" onchange="previewImage(this);" name="image">
                    <p>preview;</p>
                    <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="w-100 h-75" style="object-fit: contain;">
                    </div>
                    <script>
                    function previewImage(obj)
                    {
                        var fileReader = new FileReader();
                        fileReader.onload = (function() {
                            document.getElementById('preview').src = fileReader.result;
                        });
                        fileReader.readAsDataURL(obj.files[0]);
                    }
                    </script>
                </div>
                
                <div class="col-md-5">
                    <div class="title">
                        <h2>タイトル</h2>
                        <input type="text" class="w-75" name="post[title]" placeholder="title" value="{{ old('post.title') }}"/>
                        <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                    </div>
                    
                    <div class="comment">
                        <h2>コメント</h2>
                        <textarea class="w-75" name="post[comment]" placeholder="comment">{{ old('post.comment') }}</textarea>
                        <p class="title__error" style="color:red">{{ $errors->first('post.comment') }}</p>
                    </div>
            
                    <div class="category" style="width: 90%;">
                        <h2>ジャンル</h2>
                        @foreach($categories as $category)
                        <label>
                            <input type="checkbox" value="{{ $category->id }}" name="categories_array[]">
                                {{$category->name}}
                            </input>
                        </label>
                        @endforeach
                        <p class="title__error" style="color:red">{{ $errors->first('categories_array.0') }}</p>
                    </div>
            
                    <div class="place">
                        <h2>都道府県</h2>
                        <select name="post[place_id]">
                            @foreach($places as $place)
                            <option value="{{ $place->id }}">{{ $place->name }}</option>
                            @endforeach
                        </select>
                        <p class="title__error" style="color:red">{{ $errors->first('post.place_id') }}</p>
                    </div>
            
                    <div class="address">
                        <h2>市区町村</h2>
                        <input type="text" class="w-75" name="post[address]" placeholder="address">{{ old('post.address') }}</input>
                        <p class="title__error" style="color:red">{{ $errors->first('post.address') }}</p>
                
                        <p>画像ファイルからGPS情報を取得できる場合、グーグルマップで位置情報を表示しますか？</p>
                
                    </div>
                    
                    
                </div>
            </div>
            
            
            
            
            
            
            
            
            <input type="submit" value="保存">
            
            
            
        </form>
        
        <div class="back">[<a href="/">back</a>]</div>
        
    
@endsection