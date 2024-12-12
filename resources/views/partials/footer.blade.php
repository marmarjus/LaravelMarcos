@php
    /**
     * Pie de página
     *
     * Esto es el pie de página que se incluye
     * en toda la aplicación.
     *
     * @author Marcos Martínez Justicia
     *
     * @version 1.0
     */
@endphp

<footer>
    <div>
        <span>LEVANTE UD</span>
        <span>DESARROLLADO POR MARCOS MARTÍNEZ JUSTICIA</span>
    </div>
    <div>
        <a href="{{ route('cookies.policy') }}">Política de Cookies</a>
        <a href="{{ route('cookies.settings') }}">Configuración de Cookies</a>
        <a href="{{ route('privacy.policy') }}">Política de Privacidad</a>
        <a href="{{ route('privacy.terms') }}">Términos y Condiciones de uso</a>
        <a href="{{ route('messages.create') }}">Contacto</a>
    </div>
</footer>
