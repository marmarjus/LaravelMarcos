@php
/**
 * Página para crear jugadores
 *
 * Esta página permite al administrador
 * crear un nuevo jugador mediante un formulario.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */
@endphp

@extends('layout')

@section('title', 'Nuevo jugador')

@section('content')
    <div class="form-player">
        <h2>¿Quieres añadir un jugador?</h2>

        <form action="{{ route('players.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <div class="form-player-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="twitter">Twitter:</label>
            <input type="text" name="twitter" id="twitter" value="{{ old('twitter') }}">
            @error('twitter')
                <div class="form-player-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="instagram">Instagram:</label>
            <input type="text" name="instagram" id="instagram" value="{{ old('instagram') }}">
            @error('instagram')
                <div class="form-player-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="twitch">Twitch:</label>
            <input type="text" name="twitch" id="twitch" value="{{ old('twitch') }}">
            @error('twitch')
                <div class="form-player-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="visible">Visible:</label>
            <input type="checkbox" name="visible" id="visible">
            <br>

            <label for="title">Puesto:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <div class="form-player-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="desc">Descripción:</label>
            <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
            @error('desc')
                <div class="form-player-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="image" class="custom-file-upload">
                Seleccionar imagen
            </label>
            <input type="file" name="image" id="image">
            <br>
            <br>
            <div class="form-player-error">
                @error('image')
                    Error: {{ $message }}
                @enderror
            </div>
            <br>

            <input type="submit" value="Enviar">
        </form>
    </div>
@endsection
