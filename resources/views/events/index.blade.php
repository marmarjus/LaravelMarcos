@php
    /**
     * Página de eventos
     *
     * Esta página contiene una lista con los eventos
     * y los muestra en función del usuario que la está visualizando.
     * Además, los usuarios con cuenta pueden darles me gusta,
     * y el administrador puede modificarlos o eliminarlos.
     *
     * @author Marcos Martínez Justicia
     *
     * @version 1.0
     */
@endphp

@extends('layout')

@section('title', 'Eventos')

@section('content')
    <div class="events-container">
        <div class="events-header">
            <h1>Próximos eventos</h1>
        </div>
        <div class="events-list">
            @forelse ($events as $event)
                <div class="event-item">
                    @auth
                        <a class="event-title" href="{{ route('events.show', $event) }}">{{ $event->name }}</a>
                    @else
                        <p class="event-title">{{ $event->name }}</p>
                    @endauth
                    <p class="event-description">{{ $event->description }}</p>
                    <p class="event-details">
                        <span class="event-location">{{ $event->location }}</span><br>
                        <span class="event-date">{{ $event->date }}</span><br>
                        <span class="event-hour">{{ $event->hour }}</span><br>
                        <span class="event-type">
                            @if ($event->type == 'official')
                                Oficial
                            @elseif($event->type == 'exhibition')
                                Exhibición
                            @elseif($event->type == 'charity')
                                Benéfico
                            @endif
                        </span>
                        <br>
                        <span class="event-tags">{{ $event->tags }}</span>
                    </p>

                    @auth
                        <div class="event-actions">

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


                            @if (Auth::user()->rol == 'admin')
                                <div class="event-admin">
                                    <a class="event-edit" href="{{ route('events.edit', $event->id) }}"><i
                                            class="fas fa-pencil-alt fa-lg"></i></a>
                                    <div class="event-delete">
                                        <form action="{{ route('events.destroy', ['event' => $event->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"><i class="fa fa-trash fa-lg"></i></button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endauth
                </div>
            @empty
                <div class="event-null">No hay eventos</div>
            @endforelse
        </div>
    </div>
@endsection
