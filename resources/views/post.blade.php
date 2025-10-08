@extends('layout/main')

@section('content')
    <div class="" id="post_view_section">
        <h1>{{$post->title}}</h1>
        <div class="ck-content">
            {!!$post->content!!}
        </div>
        @foreach($post->tags as $tag)
            <span class="badge" style="background-color: {{$tag->color}}; color: {{$tag->textColor}}">{{$tag->name}}</span>
        @endforeach
    </div>
@endsection
