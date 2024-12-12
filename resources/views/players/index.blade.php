@php
/**
 * Página para visualizar jugadores
 *
 * Esta página permite a cualquier usuario
 * ver una lista de los jugadores.
 * El usuario administrador puede ver todos los jugadores,
 * mientras que el resto solo los visibles.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */
@endphp

@extends('layout')

@section('title', 'Jugadores')

@section('content')
    <div class="players">
        <div>
            <h1>Lista de jugadores</h1>
        </div>
        <div class="players-list">
            @forelse ($players as $player)
                @auth
                    @if (Auth::user()->rol == 'admin')
                        <div class="player-data">
                            <img src="{{ asset('storage/img/' . $player->name . '.png') }}" alt="Foto de {{ $player->name }}">
                            @auth
                                <a href="{{ route('players.show', $player->id) }}">{{ $player->name }}</a>
                            @else
                                {{ $player->name }}
                            @endauth
                        </div>
                    @else
                        @if ($player->visible == true)
                            <div class="player-data">
                                <img src="{{ asset('storage/img/' . $player->name . '.png') }}" alt="Foto de {{ $player->name }}">
                                @auth
                                    <a href="{{ route('players.show', $player->id) }}">{{ $player->name }}</a>
                                @else
                                    {{ $player->name }}
                                @endauth

                            </div>
                        @endif
                    @endif
                @else
                    @if ($player->visible == true)
                        <div class="player-data">
                            <img src="{{ asset('storage/img/' . $player->name . '.png') }}" alt="Foto de {{ $player->name }}">
                            @auth
                                <a href="{{ route('players.show', $player->id) }}">{{ $player->name }}</a>
                            @else
                                {{ $player->name }}
                            @endauth
                        </div>
                    @endif
                @endauth
            @empty
                <div class="players-null">No hay jugadores</div>
            @endforelse
        </div>
    </div>
@endsection
