@extends('layout.main')
@section('content')
    <div class="general_content">
        <div class="container">
            <form method="post" action="{{route('general.update')}}" enctype="multipart/form-data">
                @csrf
                <div class="header">Общая информация</div>
                <div class="content">
                    @error('avatar')
                    <span style="color: red">
                            {{$message}}
                        </span>
                    @enderror
                    <label>Аватарка</label>
                    <input type="file" name="avatar">

                    <label>Фон профиля</label>
                    <input type="file" name="backProfile">
                    @error('name')
                        <span style="color: red">
                            {{$message}}
                        </span>
                    @enderror
                    <label>Имя</label>
                    <input type="text" name="name" placeholder="Имя" value="{{auth()->user()->name}}">
                    @error('firstName')
                    <span style="color: red">
                            {{$message}}
                        </span>
                    @enderror
                    <label>Фамилия</label>
                    <input type="text" name="firstName" placeholder="Фамилия" value="{{auth()->user()->first_name}}">
                    @error('about')
                    <span style="color: red">
                            {{$message}}
                        </span>
                    @enderror
                    <label>Описание</label>
                    <textarea placeholder="Краткий статус о себе" name="about">{{auth()->user()->about}}</textarea>
                    <button class="add-button" type="submit">Добавить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
