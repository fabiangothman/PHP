<header>
    <h1>Laravel 8</h1>
    <nav>
        <ul>
            <li>
                <a class="{{ (request()->routeIs('home')) ? 'active' : '' }}" href="{{route('home')}}">Home</a>
            </li>
            <li>
                <a class="{{ (request()->routeIs('cursos.*')) ? 'active' : '' }}" href="{{route('cursos.index')}}">Cursos</a>
            </li>
            <li>
                <a class="{{ (request()->routeIs('nosotros')) ? 'active' : '' }}" href="{{route('nosotros')}}">Nosotros</a>
            </li>
            <li>
                <a class="{{ (request()->routeIs('contactanos.index')) ? 'active' : '' }}" href="{{route('contactanos.index')}}">Contáctanos</a>
            </li>
        </ul>
    </nav>
</header>