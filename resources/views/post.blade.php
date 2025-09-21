@extends('layout/main')

@section('content')
        <h1>{{$post->title}}</h1>
        <div class="ck-content">
            {!!$post->content!!}
        </div>
@endsection
