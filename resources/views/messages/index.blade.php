@php
/**
 * Página de visualización de mensajes
 *
 * Esta página permite al administrador
 * leer los mensajes que los usuarios le han enviado.
 * Están ordenados de más reciente a menos.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */
@endphp

@extends('layout')

@section('title', 'Mensajes')

@section('content')
    <div class="messages-container">
        <div class="messages-title">
            <h1>Lista de Mensajes</h1>
        </div>
        <div class="messages-list">
            @forelse ($messages as $message)
                <div class="message-item {{ $message->read ? 'message-read' : 'message-unread' }}">
                    <a href="{{ route('messages.show', $message->id) }}" class="message-link">
                        <div class="message-info">
                            <h3>{{ $message->subject }}</h3>
                            <p class="message-sender">{{ $message->name }}</p>
                        </div>
                        <div class="message-date">{{ $message->created_at }}</div>
                    </a>
                </div>

            @empty
                <div class="message-null">No hay mensajes</div>
            @endforelse
        </div>
    </div>
@endsection
