<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/admin.js'])
    <title>adminPanel</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
<div>
    <div class="row">
        <div>
            <div class="row min-vh-100">

                <div class="col-md-3 col-lg-2 bg-dark text-white p-0">
                    <div class="d-flex flex-column h-100">

                        <div class="p-3 text-center bg-primary">
                            <span class="fs-4 fw-bold">Меню</span>
                        </div>


                        <ul class="nav nav-pills flex-column flex-grow-1 p-3">
                            <li class="nav-item mb-2">
                                <a href="{{route('home')}}" class="nav-link active text-white bg-secondary">
                                    Главная
                                </a>
                            </li>

                            <li class="nav-item mb-2">
                                <button
                                    class="btn btn-toggle d-inline-flex align-items-center rounded border-0 text-white"
                                    data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="true">
                                    <span>Посты</span>
                                </button>
                                <div class="collapse show" id="orders-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li class="my-1">
                                            <a href="{{route('admin.post.create')}}"
                                               class="text-white d-inline-flex align-items-center text-decoration-none rounded ps-3 py-1">
                                                <i class="bi bi-plus-circle me-2"></i> Создать
                                            </a>
                                        </li>
                                        <li class="my-1">
                                            <a href="{{route('admin.post.index')}}"
                                               class="text-white d-inline-flex align-items-center text-decoration-none rounded ps-3 py-1">
                                                <i class="bi bi-pencil-square me-2"></i> Все посты
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item mb-2">
                                <a href="{{route('admin.category.index')}}" class="nav-link text-white">
                                    Категории
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{route('admin.tag.index')}}" class="nav-link text-white">
                                    Теги
                                </a>
                            </li>

                            <li class="nav-item mb-2">
                                <button
                                    class="btn btn-toggle d-inline-flex align-items-center rounded border-0 text-white"
                                    data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="true">
                                    <span>Пользователи</span>
                                </button>
                                <div class="collapse show" id="orders-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li class="my-1">
                                            <a href="{{route('admin.user.create')}}"
                                               class="text-white d-inline-flex align-items-center text-decoration-none rounded ps-3 py-1">
                                                Добавить
                                            </a>
                                        </li>
                                        <li class="my-1">
                                            <a href="{{route('admin.user.index')}}"
                                               class="text-white d-inline-flex align-items-center text-decoration-none rounded ps-3 py-1">
                                                Список
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9 col-lg-10 p-4 bg-light">
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
