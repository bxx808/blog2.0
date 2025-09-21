@extends('layout.main')

@section('content')
    <form class="article_form">
        <textarea placeholder="Напишите что-нибудь"></textarea>
        <button>
            <img src="{{asset('/images/icons/send.svg')}}">
        </button>
    </form>

    <div class="articles">
        @foreach($posts as $post)
            <div class="article">
                <img class="main_photo" src="{{asset($post->main_image_url)}}">
                <div class="text_content">
                    <h2>{{$post->title}}</h2>
                    <p>
                        {{$post->short_description}}
                    </p>
                    <div class="row">
                        <div class="left">
                            <span>{{(new DateTime($post->created_at))->format('d-m-Y')}}</span>
                            <img src="{{asset('/images/icons/ellipse.svg')}}" alt="">
                            <span>{{$post->category->name}}</span>
                        </div>
                        <a href="{{route('post', ['id' => $post->id])}}">читать</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
