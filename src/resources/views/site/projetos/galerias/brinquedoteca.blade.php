@extends('layout.site')
@section('title', 'Brinquedoteca | Pingo Decor')
@section('content')

    <a href="{{ route('projetos.index') }}" class="btn-voltar">Voltar aos projetos</a>

    <div class="galeria-grid">

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/brinquedoteca.jpg') }}" alt="Brinquedoteca" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/brinquedoteca.jpg') }}" alt="Brinquedoteca" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/brinquedoteca.jpg') }}" alt="Brinquedoteca" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/brinquedoteca.jpg') }}" alt="Brinquedoteca" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/brinquedoteca.jpg') }}" alt="Brinquedoteca" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/brinquedoteca.jpg') }}" alt="Brinquedoteca" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/brinquedoteca.jpg') }}" alt="Brinquedoteca" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/brinquedoteca.jpg') }}" alt="Brinquedoteca" loading="lazy"></div>

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/brinquedoteca.jpg') }}" alt="Brinquedoteca" loading="lazy"></div>


    <link rel="stylesheet" href="{{ asset('pingo-decor/css/estilo.css') }}"> 

        
    </div>

@endsection
