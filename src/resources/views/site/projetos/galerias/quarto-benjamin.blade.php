@extends('layout.site')
@section('title', 'Quarto Benjamin | Pingo Decor')
@section('content')

    <a href="{{ route('projetos.index') }}" class="btn-voltar">Voltar aos projetos</a>

    <div class="galeria-grid">

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_3706.jpg') }}" alt="Quarto Benjamin" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_3706.jpg') }}" alt="Quarto Benjamin" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_3706.jpg') }}" alt="Quarto Benjamin" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_3706.jpg') }}" alt="Quarto Benjamin" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_3706.jpg') }}" alt="Quarto Benjamin" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_3706.jpg') }}" alt="Quarto Benjamin" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_3706.jpg') }}" alt="Quarto Benjamin" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_3706.jpg') }}" alt="Quarto Benjamin" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/_mg_3706.jpg') }}" alt="Quarto Benjamin" loading="lazy"></div>

    <link rel="stylesheet" href="{{ asset('pingo-decor/css/estilo.css') }}"> 
    <link rel="stylesheet" href="{{ asset('pingo-decor/css/responsivoo.css') }}"> 

    </div>

@endsection

