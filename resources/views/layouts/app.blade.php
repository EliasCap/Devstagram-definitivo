<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devstagram @yield('titulo')</title>
</head>
<body>
    <nav>
        <a href="/">Inicio</a>
        <a href="/principal">Prinipal</a>

    </nav>
    <h1>@yield('titulo')</h1>

    <hr>

    @yield('contenido')


</body>
</html>