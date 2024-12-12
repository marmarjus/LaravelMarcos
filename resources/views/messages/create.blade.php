@php
/**
 * Página para enviar mensajes
 *
 * Esta página permite a cualquier usuario
 * enviar un mensaje al administrador
 * mediante un formulario.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */
@endphp

@extends('layout')

@section('title', 'Contacto')

@section('content')
    <div class="form-message">
        <h2>Envíanos un mensaje y te ayudaremos</h2>

        <form action="{{ route('messages.store') }}" method="post">
            @csrf

            <input type="text" name="name" id="name" placeholder="Escribe tu nombre..." value="{{ old('name') }}">
            @error('name')
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror

            <input type="text" name="subject" id="subject" placeholder="Escribe el asunto del mensaje..."
                value="{{ old('subject') }}">
            @error('subject')
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror

            <textarea name="text" id="text" cols="30" rows="10" placeholder="Escribe el contenido del mensaje...">{{ old('text') }}</textarea>
            @error('text')
                <div class="form-event-error">
                    Error: {{ $message }}
                </div>
            @enderror

            <input type="submit" value="Enviar">
        </form>
    </div>
@endsection
