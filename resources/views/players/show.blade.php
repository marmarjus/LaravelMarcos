@php
/**
 * Página de detalles de jugador
 *
 * Esta página permite a cualquier usuario
 * ver los detalles de un jugador y al administrador,
 * hacerlo visible o no.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */
@endphp

@extends('layout')

@section('title', $player->name)

@section('content')
    <div class="player-info">
        <img src="{{ asset('storage/img/' . $player->name . '.png') }}" alt="Foto de {{ $player->name }}">
        <h1>{{ $player->name }}</h1>
        <h2>{{ $player->twitter }}</h2>
        <h2>{{ $player->instagram }}</h2>
        <h2>{{ $player->twitch }}</h2>
        <h3>{{ $player->title }}</h3>
        <h4>{{ $player->description }}</h4>


        @if (Auth::user()->rol == 'admin')
            <div class="player-form-visible">
                <form action="{{ route('players.update', $player) }}" method="post">
                    @csrf
                    @method('put')

                    <label for="visible">Visible:</label>
                    <input type="checkbox" name="visible" id="visible" {{ $player->visible == 1 ? 'checked' : '' }}>
                    <input type="submit" value="Editar">
                    <br>
                </form>
            </div>
        @endif
    </div>
@endsection
