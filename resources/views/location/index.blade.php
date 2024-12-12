@php
/**
 * Página de ubicación
 *
 * Esta página muestra la ubicación del club
 * con un iframe.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */
@endphp

@extends('layout')

@section('title', 'Dónde estamos')

@section('content')
    <div class="stadium">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3692.2470815248976!2d-0.3638088!3d39.494690899999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd60461ac9e7703f%3A0x73d6387f49471238!2sEstadi%20Ciutat%20de%20Val%C3%A8ncia!5e1!3m2!1sca!2ses!4v1708021153968!5m2!1sca!2ses"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
