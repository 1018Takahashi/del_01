@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<body class="bg-secondary bg-opacity-25">
　  <div class="bg-dark">
　      <br>
        <h1 class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">投稿作成画面</h1>
        
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            
            <input type="hidden" name="post[user_id]" value="{{ Auth::id() }}">
            
            <div class="row" style="position:relative; height:110%">
                
                <div class="col-md-1"></div>
                
                <div class="col-md-5 h-100">
                    <div class="img">
                        <h2 class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">Image</h2>
                        <input class="text-light" type="file" onchange="previewImage(this);" name="image">
                        <p　class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">preview:</p>
                        @if(mb_strlen($errors->first('image')) >> 1)
                        <p class="title__error" style="color:red">画像をアップロードしてください</p>
                        @endif
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
                        <h2 class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">タイトル</h2>
                        <input type="text" class="w-75　imput-bar" name="post[title]" placeholder="title" value="{{ old('post.title') }}"/>
                        @if(mb_strlen($errors->first('post.title')) >> 5)
                        <p class="title__error" style="color:red">タイトルを入力してください</p>
                        @endif
                    </div>
                    
                    <br>
                    
                    <div class="comment">
                        <h2 class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">コメント</h2>
                        <textarea class="w-75　imput-bar" name="post[comment]" placeholder="comment">{{ old('post.comment') }}</textarea>
                    </div>
                    
                    <br>
            
                    <div class="category" style="width: 90%;">
                        <h2 class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">ジャンル</h2>
                        @foreach($categories as $category)
                        <label class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">
                            <input type="checkbox" value="{{ $category->id }}" name="categories_array[]" {{ collect(old('categories_array'))->contains($category->id) ? 'checked' : '' }}>
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
                            <option class="imput-bar"  style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);" value="{{ $place->id }}">{{ $place->name }}</option>
                            @endforeach
                        </select>
                        @if(mb_strlen($errors->first('post.place_id')) >> 5)
                        <p class="places__error" style="color:red">都道府県を選択してください</p>
                        @endif
                    </div>
                    
                    <br>
            
                    <div class="address">
                        <h2 class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, .5);">市区町村</h2>
                        <input type="text" class="w-75　imput-bar" name="post[address]" placeholder="address" value="{{ old('post.address') }}">
                        @if(mb_strlen($errors->first('post.address')) >> 5)
                        <p class="address__error" style="color:red">市区町村を入力してください</p>
                        @endif
                    </div>
                    
                    <br>
                    <input class="btn btn-lg btn-primary" type="submit" value="投稿"　style="position:relative; left:85%; margin-bottom:3%">
                </div>
            </div>
        </form>
    </div>
</body>
    
@endsection