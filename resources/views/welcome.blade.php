<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        img {
            width: 250px;
        }
    </style>
</head>
<body>
    <form action="{{ route('register') }}" method="post">
        <input type="text" name="name" placeholder="nome">
        <input type="password" name="password" placeholder="nome">
        <input type="email" name="email" placeholder="email">
        <button>enviar</button>
    </form>
    @foreach ($lanches as $foto)
        <img src="{{ asset('storage/'. $foto->path) }}"
            class="d-block w-100" alt="...">
    @endforeach
</body>
</html>