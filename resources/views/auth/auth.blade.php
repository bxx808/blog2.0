<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/auth.js'])
    <title>Document</title>
</head>
<body class="bg-dark text-white">
@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif
<div class="container d-flex align-items-center">
    <main class="form-signin m-auto" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%)">
        <form method="post" action="{{route('auth')}}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Авторизация</h1>
            @error('email')
            <label class="text-danger">{{$message}}</label>
            @enderror
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Почта</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Пароль</label>
            </div> <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault">
                <label class="form-check-label" for="checkDefault">
                    Запомнить меня
                </label>
            </div>
            <div class="mb-3">
                Нет аккаунта ?
                <a href="{{route('register')}}">Зарегистрироваться</a>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
            <p class="mt-5 mb-3 text-body-secondary">© 2017–2025</p>
        </form>
    </main>
</div>
</body>
</html>
