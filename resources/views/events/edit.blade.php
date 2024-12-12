@php
    /**
     * Página de edición de eventos
     *
     * Esta página permite al administrador
     * editar un evento mediante un formulario.
     *
     * @author Marcos Martínez Justicia
     *
     * @version 1.0
     */
@endphp

@extends('layout')

@section('title', 'Editar evento')

@section('content')
    <div class="form-event">
        <h2>¿Quieres editar este evento?</h2>

        <form action="{{ route('events.update', $event) }}" method="post">
            @csrf
            @method('put')

            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ $event->name }}">
            @error('name')
                <br>
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="desc">Descripción:</label>
            <textarea name="desc" id="desc" cols="30" rows="10">{{ $event->description }}</textarea>
            @error('desc')
                <br>
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="location">Lugar:</label>
            <input type="text" name="location" id="location" value="{{ $event->location }}">
            @error('location')
                <br>
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="date">Fecha:</label>
            <input type="date" name="date" id="date" placeholder="Elige una fecha..."
                value="{{ $event->date }}">
            <br>

            <label for="time">Hora:</label>
            <input type="time" name="hour" id="hour" placeholder="Elige una hora..." value="{{ $event->hour }}">
            <br>

            <label for="type">Tipo:</label>
            <select name="type" id="type">
                <option value="" disabled hidden>Selecciona un tipo</option>
                <option value="official" {{ old('type', $event->type) == 'official' ? 'selected' : '' }}>Oficial</option>
                <option value="exhibition" {{ old('type', $event->type) == 'exhibition' ? 'selected' : '' }}>Exhibición
                </option>
                <option value="charity" {{ old('type', $event->type) == 'charity' ? 'selected' : '' }}>Benéfico</option>
            </select>
            @error('type')
                <br>
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>


            <label for="tags">Etiquetas:</label>
            <textarea name="tags" id="tags" cols="30" rows="10">{{ $event->tags }}</textarea>
            @error('tags')
                <br>
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror
            <br>

            <label for="visible">Visible:</label>
            <input type="checkbox" name="visible" id="visible" {{ $event->visible == 1 ? 'checked' : '' }}>
            <br>

            <input type="submit" value="Enviar">
        </form>
    </div>
@endsection
