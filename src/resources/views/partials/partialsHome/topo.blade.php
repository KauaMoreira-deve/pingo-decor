<header class="header">
    <div class="container">
        <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('pingo-decor/assets/logo.svg') }}" alt="Pingo Decor"></a></div>
        <button class="menu-toggle" type="button" onclick="toggleMenu()" aria-label="Abrir menu">☰</button>
        <nav class="menu" id="menu" aria-label="Navega??o principal">
            <ul>
                <li><a href="{{ route('home') }}" @if (request()->routeIs('home')) aria-current="page" @endif>Home</a></li>
                <li><a href="{{ route('sobre') }}" @if (request()->routeIs('sobre')) aria-current="page" @endif>Sobre</a></li>
                <li><a href="{{ route('projetos.index') }}" @if (request()->routeIs('projetos.*')) aria-current="page" @endif>Projetos</a></li>
                <li><a href="{{ route('publicacoes') }}" @if (request()->routeIs('publicacoes')) aria-current="page" @endif>Publicações</a></li>
                <li><a href="{{ route('contato') }}" @if (request()->routeIs('contato')) aria-current="page" @endif>Contato</a></li>
            </ul>
        </nav>
    </div>
</header>
