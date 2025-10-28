@extends('layout.admin')

@section('content')
    <h1>Редактирование пользователя</h1>
    <form method="post" action="{{route('admin.user.update', $user->id)}}">
        @csrf
        <input type="hidden" name="userId" value="{{$user->id}}">
        <div class="form-floating mb-3">
            <input name="name" class="form-control" id="floatingInput" placeholder="name@example.com"
                   value="{{$user->name}}">
            <label for="floatingInput">Имя пользователя</label>
        </div>
        @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <div class="form-floating mb-3">
            <input name="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                   value="{{$user->email}}">
            <label for="floatingInput">Почта</label>
        </div>
        <select name="role" class="form-control mb-3">
            @foreach($roles as $key => $role)
                <option value="{{$key}}" {{$key == $user->role? " selected" : ' '}}>{{$role}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-outline-success form-control mt-2">Редактировать</button>
    </form>
@endsection
