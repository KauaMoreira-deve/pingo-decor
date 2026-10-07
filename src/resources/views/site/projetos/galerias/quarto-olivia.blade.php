@extends('layout.site') 
@section('title', 'Quarto Olivia | Pingo Decor') 
@section('content') 

    <a href="{{ route('projetos.index') }}" class="btn-voltar">Voltar aos projetos</a> 

    <div class="galeria-grid">

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/olivia.webp') }}" alt="Quarto Olivia" loading="lazy"></div> 
          
        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/olivia.webp') }}" alt="Quarto Olivia" loading="lazy"></div> 
         
        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/olivia.webp') }}" alt="Quarto Olivia" loading="lazy"></div> 
         
        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/olivia.webp') }}" alt="Quarto Olivia" loading="lazy"></div> 

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/olivia.webp') }}" alt="Quarto Olivia" loading="lazy"></div> 
      
        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/olivia.webp') }}" alt="Quarto Olivia" loading="lazy"></div> 

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/olivia.webp') }}" alt="Quarto Olivia" loading="lazy"></div> 
      
        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/olivia.webp') }}" alt="Quarto Olivia" loading="lazy"></div> 

        <div class="galeria"><img src="{{ asset('pingo-decor/assets/img/olivia.webp') }}" alt="Quarto Olivia" loading="lazy"></div> 

    </div>

    <link rel="stylesheet" href="{{ asset('pingo-decor/css/estilo.css') }}"> 
    <link rel="stylesheet" href="{{ asset('pingo-decor/css/responsivoo.css') }}"> 

@endsection

