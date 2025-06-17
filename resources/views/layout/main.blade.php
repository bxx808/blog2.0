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
    <nav>
        <a href="">Главная</a>
        <a href="">Новости</a>
        <a href="">Сообщения</a>
    </nav>
    <div class="content">
        @yield('content')
    </div>
</div>
</body>
</html>
