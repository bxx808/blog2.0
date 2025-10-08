@extends('layout.admin')

@section('content')
    <h1>Все посты</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <table class="table table-striped">
            <tr>
                <td>id</td>
                <td>Название</td>
                <td>Описание</td>
                <td>Теги</td>
                <td></td>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->short_description}}</td>
                    <td>
                        @foreach($post->tags as $tag)
                            {{$tag->name}}
                        @endforeach
                    </td>
                    <td class="d-flex gap-3">
                        <a class="btn btn-sm btn-primary" href="{{route('admin.post.edit', [$post->id])}}" >
                            Изменить
                        </a>
                        <form action="{{route('admin.tag.delete', ['tag' => $tag->id])}}"
                              method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger" type="submit">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="mt-3">
        {{$posts->withQueryString()->links('vendor.pagination.bootstrap-5')}}
    </div>
@endsection
