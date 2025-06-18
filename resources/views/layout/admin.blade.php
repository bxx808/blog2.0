<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/admin.js'])
    <title>adminPanel</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-3">
            <a href="{{route('admin.category.index')}}" class="text-primary fs-4">Категории</a>
        </div>
        <div class="col-9">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
