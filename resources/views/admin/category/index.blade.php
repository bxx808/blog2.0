@extends('layout.admin')

@php
    $show = session()->has('errors');
@endphp

@section('content')
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button {{$show ? '' : 'collapsed'}}" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Добавить категорию
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse {{$show ? 'show' : ''}}"
                 data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form action="{{route('admin.category.store')}}" method="post">
                        @csrf
                        @error('category')
                        <div class="d-block text-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <label for="inputPassword5" class="form-label">Категория</label>
                        <input type="text" name="category" class="form-control mb-3" value="{{old('category')}}">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-black bg-gradient text-white py-3">
                        <h2 class="h4 mb-0 text-center"><i class="bi bi-plus-circle me-2"></i>Список категорий</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Название</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            @foreach($categories as $category)
                                <tbody>
                                <tr>
                                    <th scope="row">{{$category->id}}</th>
                                    <td></td>
                                    <td>{{$category->name}}</td>
                                    <td></td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
