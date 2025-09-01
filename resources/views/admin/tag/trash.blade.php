@extends('layout.admin')

@section('content')
    {{ Breadcrumbs::render('admin.tag.trash') }}
    <section id="tag" class="view_list">
        <div class="container py-5">
            <h3 class="">Список категорий</h3>
            <div class="card ">
                <div class="card-body p-0">
                    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                         style="position: relative">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Название</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{$tag->id}}</td>
                                    <td>{{$tag->name}}</td>
                                    <td class="d-flex gap-3">
                                        <form
                                            action="{{route('admin.tag.delete', ['tag' => $tag->id])}}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-outline-danger" type="submit">
                                                Удалить
                                            </button>
                                        </form>
                                        <form
                                            action="{{route('admin.tag.recover', ['tag' => $tag->id])}}"
                                            method="post">
                                            @csrf
                                            @method('patch')
                                            <button class="btn btn-sm btn-outline-success" type="submit">
                                                Восстановить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
