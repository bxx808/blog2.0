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
                        <a class="btn btn-sm btn-primary" href="http://127.0.0.1:8000/admin/posts/edit/16">
                            Изменить
                        </a>
                        <form action="http://127.0.0.1:8000/admin/posts/delete/16" method="post">
                            <input type="hidden" name="_token" value="S9Mjr16ZB4YcQvfv7b29ZerBO1VDFfI1fgHxvM25"
                                   autocomplete="off"> <input type="hidden" name="_method" value="delete">
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
