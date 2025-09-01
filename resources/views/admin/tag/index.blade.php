@extends('layout.admin')

@php
    $show = session()->has('errors');
@endphp

@section('content')
    {{ Breadcrumbs::render('admin.tag.index') }}
    <section id="tag" class="view_list">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button {{$show ? '' : 'collapsed'}}" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Добавить тег
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse {{$show ? 'show' : ''}}"
                     data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form action="{{route('admin.tag.store')}}" method="post">
                            @csrf
                            @error('tag')
                            <div class="d-block text-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <label for="inputPassword5" class="form-label">Тег</label>
                            <input type="text" name="name" class="form-control mb-3" value="{{old('name')}}">
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <h3 class="">Список тегов</h3>
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
                                        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseOne{{$tag->id}}">
                                            Изменить
                                        </button>
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
                                <tr>
                                    <td colspan="3" class="p-0">
                                        <div class="accordion-collapse collapse"
                                             id="flush-collapseOne{{$tag->id}}">
                                            <div class="card card-body">
                                                <form action="{{route('admin.tag.edit', $tag->id)}}"
                                                      method="post">
                                                    @method('patch')
                                                    @csrf
                                                    <div class="d-flex justify-content-between">
                                                        <div class="col-8">
                                                            <input type="text" name="name" class="form-control"
                                                                   value="{{$tag->name}}">
                                                        </div>
                                                        <div class="">
                                                            <button type="submit" class="btn btn-sm btn-primary">
                                                                Сохранить
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{route('admin.tag.trash')}}" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
                     viewBox="0 0 16 16">
                    <path
                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                    <path
                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
                Корзина
            </a>
        </div>
    </section>
@endsection
