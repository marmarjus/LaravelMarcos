@php
/**
 * Plantilla de la aplicación
 *
 * Este archivo contiene las partes básicas
 * que el resto de páginas rellenan con su contenido.
 *
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css" />
</head>

<body>
    @include('partials.nav')

    <div>@yield('content')</div>

    <br>

    @include('partials.footer')
</body>

</html>
