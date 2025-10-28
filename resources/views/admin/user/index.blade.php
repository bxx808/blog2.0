@extends('layout.admin')

@section('content')
    <h1>Список пользователей</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <table class="table table-striped">
            <tbody>
            <tr>
                <td>id</td>
                <td>Имя</td>
                <td>Почта</td>
                <td></td>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td class="d-flex gap-3">
                        <a class="btn btn-sm btn-primary" href="{{route('admin.user.edit', $user->id)}}">
                            Изменить
                        </a>
                        <form action="{{route('admin.user.delete', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" type="submit">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
