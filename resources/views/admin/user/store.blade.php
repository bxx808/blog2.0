@extends('layout.admin')

@section('content')
    <h1>Пользователи</h1>
    <form method="post" action="{{route('admin.user.store')}}">
        @csrf
        <div class="form-floating mb-3">
            <input name="name" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Имя пользователя</label>
        </div>
        <div class="form-floating mb-3">
            <input name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Почта</label>
        </div>
        <div class="form-floating mb-3">
            <input name="password" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Пароль</label>
        </div>
        <button type="submit" class="btn btn-outline-success form-control mt-2">Создать</button>
    </form>
@endsection
