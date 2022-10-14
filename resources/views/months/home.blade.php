@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<body class="bg-secondary bg-opacity-25">
    <div class="bg-dark" style="width:100%;">
        <div style="height:5%"></div>
        <!--月一覧-->
        <div class='row' style="position:relative; width:95%; left:3.75%">
            @foreach ($months as $month)
            <div class="col-md-3">
                <a href="/months/{{ $month->id }}">
                    <div class="m-body">
                        <img src="/image/month/{{ $month->name }}.jpeg"/>
                        <h1>{{ $month->name }}</h1>
                    </div>
                </a>
                <div style="position:relative; width:100%; height:10%; padding:10%"></div>
            </div>
            @endforeach
        </div>
    </div>
</body>
@endsection