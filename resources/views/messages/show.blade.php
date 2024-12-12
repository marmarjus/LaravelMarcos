@php
    /**
     * Página de borrado de mensaje
     *
     * Esta página permite al administrador
     * visualizar los detalles de un mensaje
     * y eliminarlo.
     *
     * @author Marcos Martínez Justicia
     *
     * @version 1.0
     */
@endphp

@extends('layout')

@section('title', 'Mensaje')

@section('content')
    <div class="message-information">
        {{ $message->name }}<br>
        {{ $message->subject }}<br>
        {{ $message->text }}<br>
        {{ $message->created_at }}<br>

        <br>
        <div class="message-delete">
            <form action="{{ route('messages.destroy', ['message' => $message->id]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Eliminar</button>
            </form>

        </div>
    </div>

@endsection
