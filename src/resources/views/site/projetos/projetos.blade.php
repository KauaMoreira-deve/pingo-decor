@extends('layout.site')
@section('title', 'Projetos | Pingo Decor')
@section('content')
<!-- SEÇÃO PROJETOS -->
<section id="projetos"></section>

<div class="projetos-linha">

  @foreach (($projetosDinamicos ?? collect()) as $projetoDinamico)
    @php
      $caminhoProjeto = 'pingo-decor/assets/' . ltrim($projetoDinamico->imagem_projetos, '/');
      $imagemProjeto = file_exists(public_path($caminhoProjeto))
        ? asset($caminhoProjeto)
        : asset('pingo-decor/assets/imagem-indisponivel.svg');
    @endphp
    <article class="projeto-card">
      <div class="projeto quarto">
        <img src="{{ $imagemProjeto }}" alt="{{ $projetoDinamico->nome_projetos }}" loading="lazy">
        <p>{{ mb_strtoupper($projetoDinamico->nome_projetos) }}</p>
      </div>
    </article>
  @endforeach

  <a href="{{ route('projetos.show', 'quarto-olivia') }}" class="projeto-card">
    <div class="projeto quarto">
      <img src="{{ asset('pingo-decor/assets/img/olivia.webp') }}" alt="Quarto Olivia" loading="lazy">
      <p>QUARTO OLIVIA</p>
    </div>
  </a>

  <a href="{{ route('projetos.show', 'quarto-matteo') }}" class="projeto-card">
    <div class="projeto quarto">
      <img src="{{ asset('pingo-decor/assets/quarto-matteo.jpg') }}">
      <p>QUARTO MATTEO</p>
    </div>
  </a>

  <a href="{{ route('projetos.show', 'quarto-lucca') }}" class="projeto-card">
    <div class="projeto quarto">
      <img src="{{ asset('pingo-decor/assets/img/lucca.webp') }}">
      <p>QUARTO LUCCA</p>
    </div>
  </a>

  <a href="{{ route('projetos.show', 'quarto-julia-isabella') }}" class="projeto-card">
    <div class="projeto quarto">
      <img src="{{ asset('pingo-decor/assets/img/_mg_8880.jpg') }}">
      <p>QUARTO JULIA E ISABELLA</p>
    </div>
  </a>

  <a href="{{ route('projetos.show', 'quarto-joaquim') }}" class="projeto-card">
    <div class="projeto quarto">
      <img src="{{ asset('pingo-decor/assets/img/joaquim.png') }}" alt="">
      <p>QUARTO JOAQUIM</p>
    </div>
  </a>

  <a href="{{ route('projetos.show', 'quarto-dan-ava') }}" class="projeto-card">
    <div class="projeto quarto">
      <img src="{{ asset('pingo-decor/assets/img/_MG_1853.jpg') }}">
      <p>QUARTO DAN & AVA</p>
    </div>
  </a>

  <a href="{{ route('projetos.show', 'quarto-catarina') }}" class="projeto-card">
    <div class="projeto quarto">
      <img src="{{ asset('pingo-decor/assets/quarto catarina/_mg_1482.jpg') }}">
      <p>QUARTO CATARINA</p>
    </div>
  </a>

  <a href="{{ route('projetos.show', 'quarto-benjamin') }}" class="projeto-card">
    <div class="projeto quarto">
      <img src="{{ asset('pingo-decor/assets/img/_mg_3739.jpg') }}">
      <p>QUARTO BENJAMIN</p>
    </div>
  </a>

  <a href="{{ route('projetos.show', 'quarto-alice-catarina') }}" class="projeto-card">
    <div class="projeto quarto">
      <img src="{{ asset('pingo-decor/assets/img/img_2207.jpg') }}">
      <p>QUARTO ALICE & CATARINA</p>
    </div>
  </a>

<a href="{{ route('projetos.show', 'brinquedoteca') }}" class="projeto-card">
  <div class="projeto">
<img src="{{ asset('pingo-decor/assets/img/brinquedoteca.jpg') }}" alt="">
    <p>BRINQUEDOTECA GAEL, THEO E SOPHIA</p>
  </div>
</a>
</div>








<!-- GSAP -->


<!-- ScrollTrigger -->
@endsection
