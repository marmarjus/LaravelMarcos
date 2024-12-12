@php
/**
 * Página de cuenta
 *
 * Esta página contiene los datos
 * del usuario que ha inciado sesión
 * en la aplicación, junto con un enlace
 * para editar el cumpleaños y la contraseña.
 *
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */
@endphp

@extends('layout')

@section('title', 'Cuenta')

@section('content')
    @auth
        <h1>Bienvenido {{ Auth::user()->name }}</h1>

        <div class="user-data">
            <div class="user-name">Nombre: {{ Auth::user()->name }}</div>
            <div class="user-email">Email: {{ Auth::user()->email }}</div>
            <div class="user-birthday">Fecha de nacimiento: {{ Auth::user()->birthday }}</div>
            <div class="user-role">Rol: {{ Auth::user()->rol }}</div>
        </div>

        <div class="user-edit">
            <a href="{{ route('user.edit', Auth::user()) }}">Editar usuario</a>
        </div>
    @else
        <div class="user-error">
            <h1>No se ha podido iniciar sesión</h1>
        </div>
    @endauth
@endsection
