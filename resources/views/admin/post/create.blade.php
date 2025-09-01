@extends('layout.admin')

@section('content')
    <h1>Посты</h1>
    <form method="post" action="{{route('admin.post.store')}}">
        @csrf
        <input name="title" class="form-control mb-2">
        <textarea class="" id="editor">
        </textarea>
        <select class="form-control mt-2">
            <option>1</option>
        </select>
        <button type="submit" class="btn btn-outline-success form-control mt-2">Опубликовать</button>
    </form>
@endsection
