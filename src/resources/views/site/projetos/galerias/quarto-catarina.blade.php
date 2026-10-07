@extends('layout.site')
@section('title', 'Quarto Catarina | Pingo Decor')
@section('content')

    <a href="{{ route('projetos.index') }}" class="btn-voltar">Voltar aos projetos</a>

    <div class="galeria-grid">

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_1432.jpg') }}" alt="Quarto Catarina" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_1432.jpg') }}" alt="Quarto Catarina" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_1432.jpg') }}" alt="Quarto Catarina" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_1432.jpg') }}" alt="Quarto Catarina" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_1432.jpg') }}" alt="Quarto Catarina" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_1432.jpg') }}" alt="Quarto Catarina" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_1432.jpg') }}" alt="Quarto Catarina" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_1432.jpg') }}" alt="Quarto Catarina" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_1432.jpg') }}" alt="Quarto Catarina" loading="lazy"></div>


    <link rel="stylesheet" href="{{ asset('pingo-decor/css/estilo.css') }}"> 
    <link rel="stylesheet" href="{{ asset('pingo-decor/css/responsivoo.css') }}"> 

    </div>

@endsection

