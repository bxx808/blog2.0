<form autocomplete="off" method="post" action="{{$action}}">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Авторизация</h1>
    @error('email')
    <label class="text-danger">{{$message}}</label>
    @enderror
    <div class="form-floating mb-3">
        <input autocomplete="off" type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Почта</label>
    </div>
    <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Пароль</label>
    </div>
    <div class="form-check text-start my-3">
        <label class="form-check-label" for="checkDefault">
            Запомнить меня
        </label>
        <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault">
    </div>
    <div class="mb-3">
        Нет аккаунта ?
        <a href="{{route('register')}}">Зарегистрироваться</a>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
    <p class="mt-5 mb-3 text-body-secondary">© 2017–2025</p>
</form>
