@extends('layout.admin')

@section('content')
    <h1>Редактирование</h1>
    <form method="post" action="{{route('admin.post.update', $post->id)}}" enctype="multipart/form-data">
        @method('patch')
        @csrf
        @error('title')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <input name="title" class="form-control mb-2" value="{{$post->title}}">
        @error('short_description')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <textarea class="form-control mb-2" name="short_description">{{$post->short_description}}</textarea>
        @error('main_image')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <input type="file" class="form-control mb-2" name="main_image">
        <img src="{{asset('storage/' . $post->main_image)}}" alt="" class="mb-2">
        @error('content')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <textarea class="" id="editor" name="content">
            {{$post->content}}
        </textarea>
        @error('category_id')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <select class="form-control mt-2" name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}" {{$post->category->id == $category->id? ' selected' : ' '}}>{{$category->name}}</option>
            @endforeach
        </select>
        @error('tags')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <select class="form-select mt-2" name="tags[]" multiple>
            @foreach($tags as $tag)
                <option value="{{$tag->id}}" {{$post->tags->contains('id', $tag->id)? ' selected' : ' '}}>{{$tag->name}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-outline-success form-control mt-2">Опубликовать</button>
    </form>
@endsection
