@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<body class="bg-secondary bg-opacity-25">
    <div class="bg-dark" style="width:100%;">
        <div style="height:5%"></div>
        <!--カテゴリー一覧-->
        <div class='row' style="position:relative; width:95%; left:3.75%">
            @foreach ($categories as $category)
            <div class="col-md-2">
                <a href="/categories/{{ $category->id }}">
                    <div class="c-body">
                        <img src="/image/category/{{ $category->name }}.jpeg"/>
                        <h2>{{ $category->name }}</h2>
                    </div>
                </a>
                <div style="position:relative; width:100%; height:10%; padding:10%"></div>
            </div>
            @endforeach
        </div>
    </div>
</body>
@endsection