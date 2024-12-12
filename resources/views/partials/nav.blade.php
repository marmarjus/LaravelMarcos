@php
/**
 * Cabecera de página
 *
 * Esto es la cabecera de página que se incluye
 * en toda la aplicación.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */
@endphp

<header>
    <nav>
        <div>
            <a href="{{ route('index') }}"><img src="{{ asset('img/levante_logo.png') }}" alt=""></a>
            <span>Levante UD</span>
        </div>
        <div>
            <a href="{{ route('players.index') }}">Jugadores</a>
            <a href="{{ route('events.index') }}">Eventos</a>
            <a href="{{ route('products.index') }}">Tienda</a>
            <a href="{{ route('messages.create') }}">Contacto</a>
            <a href="{{ route('location.index') }}">Dónde estamos</a>

            @auth
                @if (Auth::user()->rol == 'admin')
                    <a href="{{ route('players.create') }}">Añadir jugador</a>
                    <a href="{{ route('events.create') }}">Añadir evento</a>
                    <a href="{{ route('messages.index') }}">Mensajes</a>
                @endif
            @endauth
        </div>
        <div>
            @auth
                <a href="{{ route('users.account') }}">Mi Cuenta</a>
                <a href="{{ route('logout') }}">Cerrar sesión</a>
            @else
                <a href="{{ route('login') }}">Iniciar sesión</a>
                <a href="{{ route('signup') }}">Crear cuenta</a>
            @endauth
        </div>
    </nav>
</header>
