@php
/**
 * Página que muestra un evento
 *
 * Esta página permite a un usuario con cuenta
 * visualizar los detalles de un evento.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */
@endphp

@extends('layout')

@section('title', $event->name)

@section('content')
    <div class="event-data">
        <h1>{{ $event->name }}</h1>
        <h2>{{ $event->description }}</h2>
        <h2>{{ $event->location }}</h2>
        <h3>{{ $event->date }}</h3>
        <h3>{{ $event->hour }}</h3>
        <h4>{{ $event->type }}</h4>
        <h4>{{ $event->tags }}</h4>
        <br>
        @if (Auth::user()->events->contains($event))
            <div class="event-like">
                <form action="{{ route('events.dislike', ['event' => $event]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">
                        <i class="fas fa-heart fa-lg"></i>
                    </button>
                </form>
            </div>
        @else
            <div class="event-like">
                <form action="{{ route('events.like', ['event' => $event]) }}" method="post">
                    @csrf
                    <button type="submit">
                        <i class="far fa-heart fa-lg"></i>
                    </button>
                </form>
            </div>
        @endif
    </div>
@endsection
