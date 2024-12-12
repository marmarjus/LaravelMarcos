@php
    /**
 * Página de edición de cuenta
 *
 * Esta página permite al usuario
 * que ha iniciado sesión
 * modificar su cumpleaños y contraseña
 * mediante un formulario.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */
@endphp

@extends('layout')

@section('title', 'Editar cuenta')

@section('content')
    <div class="form-event">
        <h2>Editar usuario</h2>

        <form action="{{ route('user.update', Auth::user()) }}" method="post">
            @csrf
            @method('put')

            <label for="birthday">Fecha de nacimiento:</label>
            <input type="date" name="birthday" id="birthday" value="{{ $user->birthday }}">
            @error('name')
                <br>Error: {{ $message }}
            @enderror
            <br>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" value="{{ $user->password }}">
            @error('name')
                <br>Error: {{ $message }}
            @enderror
            <br>

            <input type="submit" value="Enviar">
        </form>
    </div>
@endsection
