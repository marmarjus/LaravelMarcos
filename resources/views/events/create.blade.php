@php
/**
 * Página de creación de eventos
 *
 * Esta página permite al administrador
 * crear un evento mediante un formulario.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */
@endphp

@extends('layout')

@section('title', 'Nuevo evento')

@section('content')
    <div class="form-event">
        <h2>¿Quieres añadir un evento?</h2>

        <form action="{{ route('events.store') }}" method="post">
            @csrf

            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="desc">Descripción:</label>
            <textarea name="desc" id="desc" cols="30" rows="10">{{ old('desc') }}</textarea>
            @error('desc')
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="location">Lugar:</label>
            <input type="text" name="location" id="location" value="{{ old('location') }}">
            @error('location')
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="date">Fecha:</label>
            <input type="date" name="date" id="date" placeholder="Elige una fecha...">
            @error('date')
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="hour">Hora:</label>
            <input type="time" name="hour" id="hour" placeholder="Elige una hora...">
            @error('hour')
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="type">Tipo:</label>
            <select name="type" id="type">
                <option value="" disabled selected hidden>Selecciona un tipo</option>
                <option value="official">Oficial</option>
                <option value="exhibition">Exhibición</option>
                <option value="charity">Benéfico</option>
            </select>
            @error('type')
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="tags">Etiquetas:</label>
            <textarea name="tags" id="tags" cols="30" rows="10"></textarea>
            @error('tags')
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="visible">Visible:</label>
            <input type="checkbox" name="visible" id="visible">
            <br>

            <input type="submit" value="Enviar">
        </form>
    </div>
@endsection
