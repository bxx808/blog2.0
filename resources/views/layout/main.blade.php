<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/js/app.js'])
</head>
<body class="">
<div class="user_section">
    <div class="bg">

    </div>
    <div class="user_info">
        <div class="avatar">
            <img src="{{asset('images/user.jpg')}}" alt="">
        </div>
        <h1>Дмитрий Валак</h1>
        <p>блог front-end разработчика</p>
    </div>
</div>
<div class="main_section">
    @if(session('success'))
        <div class="toast toast_success">
            <span>{{session('success')}}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="toast toast_error">
            <span>{{session('error')}}</span>
        </div>
    @endif
    <nav>
        @auth
            <div class="">
                <a href="">Главная</a>
                <a href="">Новости</a>
                <a href="">Сообщения</a>
            </div>
            <div class="">
                @if(auth()->user()?->role == App\Models\User::ROLE_ADMIN)
                    <a href="{{route('admin.index')}}">Админпанель</a>
                @endif
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit">Выход</button>
                </form>
            </div>
        @else
            <span></span>
            <a href="{{route('login')}}">Войти</a>
        @endauth
    </nav>
    <div class="content">
        @yield('content')
    </div>
</div>
</body>
</html>
