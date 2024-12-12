@php
    /**
     * Página para crear cuenta
     *
     * Esta página permite al usuario crear una cuenta
     * para luego usarla en la aplicación.
     *
     *
     * @author Marcos Martínez Justicia
     *
     * @version 1.0
     */
@endphp

@extends('layout')

@section('title', 'Registro')

@section('content')

    <div class="form-signup">
        <h2 class="title-signup">¿Quieres crear una cuenta?</h2>

        <form action="{{ route('signup') }}" method="post">
            @csrf

            <label for="name">Nombre de usuario:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"><br><br>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}"><br><br>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" value="{{ old('password') }}"><br><br>

            <label for="password_confirmation">Repite la contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                value="{{ old('password_confirmation') }}"><br><br>

            <label for="birthday">Fecha de nacimiento:</label>
            <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}"><br><br>

            <input type="submit" value="Enviar">
        </form>
    </div>

    @if ($errors->any())
        <div class="signup-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
