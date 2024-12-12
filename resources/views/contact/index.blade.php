@extends('layout')

@section('title', 'Contacto')

@section('content')
    <form action="{{ route('messages.store') }}" method="post">
        @csrf
        <!--Preguntar al profesor cómo mostrar un mensaje de éxito al enviar el formulario-->
        <input type="text" name="name" id="name" placeholder="Escribe tu nombre...">
        <input type="text" name="subject" id="subject" placeholder="Escribe el asunto del mensaje...">
        <textarea name="text" id="text" cols="30" rows="10" placeholder="Escribe el contenido del mensaje..."></textarea>

        <input type="submit" value="Enviar">
    </form>
@endsection
