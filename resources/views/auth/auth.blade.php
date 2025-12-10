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
        <x-forms.auth-form />
    </main>
</div>
</body>
</html>
