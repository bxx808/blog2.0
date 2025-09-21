@extends('layout.admin')

@section('content')
    <h1>Посты</h1>
    <form method="post" action="{{route('admin.post.store')}}" enctype="multipart/form-data">
        @csrf
        @error('title')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <input name="title" class="form-control mb-2" value="{{old('title')}}">
        @error('short_description')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <textarea class="form-control mb-2" name="short_description" value="{{old('short_description')}}"></textarea>
        @error('main_image')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <input type="file" class="form-control mb-2" name="main_image">
        @error('content')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <textarea class="" id="editor" name="content">
            {{old('content')}}
        </textarea>
        @error('category_id')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <select class="form-control mt-2" name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('tags')
        <span class="text-danger">
            {{$message}}
        </span>
        @enderror
        <select class="form-select mt-2" name="tags[]" multiple>
            <option selected>Выберите тег</option>
            @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-outline-success form-control mt-2">Опубликовать</button>
    </form>
@endsection
