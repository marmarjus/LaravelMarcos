@php
/**
 * Página para iniciar sesión
 *
 * Esta página permite al usuario iniciar sesión
 * en la aplicación con los datos de la cuenta que creó.
 *
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */
@endphp

@extends('layout')

@section('title', 'Iniciar sesión')

@section('content')

    <div class="form-login">
        <h2 class="title-login">Por favor, inicia sesión</h2>

        <form action="{{ route('login') }}" method="post">
            @csrf

            <label for="username">Nombre de usuario:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"><br><br>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password"><br><br>

            <input type="submit" value="Enviar">
        </form>
    </div>

    @if ($errors->any())
        <div class="error-login">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
