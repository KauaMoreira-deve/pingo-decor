<!DOCTYPE html>
<html lang="pt-BR">
<head>
    @include('partials.partialsHome.head')
</head>
<body>
    @include('partials.partialsHome.topo')
    <main>
        @yield('content')
    </main>
    @include('partials.partialsHome.rodape')
    @include('partials.partialsHome.script')
</body>
</html>
