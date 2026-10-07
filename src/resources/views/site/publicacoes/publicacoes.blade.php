@extends('layout.site')
@section('title', 'Publicações | Pingo Decor')
@section('content')
<section class="publicacoes">

  <div class="publicacoes-grid">

    @foreach (($publicacoesDinamicas ?? collect()) as $publicacaoDinamica)
      @php
        $caminhoPublicacao = 'pingo-decor/assets/' . ltrim($publicacaoDinamica->imagem_publicacoes, '/');
        $imagemPublicacao = file_exists(public_path($caminhoPublicacao))
          ? asset($caminhoPublicacao)
          : asset('pingo-decor/assets/imagem-indisponivel.svg');
      @endphp
      <a href="{{ $publicacaoDinamica->link_publicacoes }}" target="_blank" rel="noopener noreferrer" class="pub-card">
        <div class="pub-img">
          <img src="{{ $imagemPublicacao }}" alt="{{ $publicacaoDinamica->titulo_publicacoes }}" loading="lazy">
        </div>
        <div class="pub-info">
          <h3>{{ mb_strtoupper($publicacaoDinamica->titulo_publicacoes) }}</h3>
          <p>{{ $publicacaoDinamica->descricao_publicacoes }}</p>
          <span class="btn-publicacao">Ver publicação →</span>
        </div>
      </a>
    @endforeach

    <a href="https://casa.abril.com.br/ambientes/transformacao-de-quartos-a-magia-do-design-de-interiores-para-criancas-em-moema/" target="_blank" class="pub-card">
      <div class="pub-img">
        <img src="{{ asset('pingo-decor/assets/img/brinquedoteca.jpg') }}" alt="">
      </div>
      <div class="pub-info">
        <h3>MAGIA DO DESIGN DE INTERIORES</h3>
        <p>Transformação de quartos: a magia do design de interiores para crianças em Moema</p>
        <span class="btn-publicacao">Ver publicação →</span>
      </div>
    </a>

    <a href="https://revistacasaejardim.globo.com/google/amp/decoracao/noticia/2023/05/bem-dividido-quarto-do-filho-da-jornalista-giovana-romani-e-divertido-e-organizado.ghtml" target="_blank" class="pub-card">
      <div class="pub-img">
        <img src="{{ asset('pingo-decor/assets/img/martim.jpeg') }}" alt="">
      </div>
      <div class="pub-info">
        <h3>QUARTO MARTIM</h3>
        <p>Bem dividido, quarto do filho da jornalista Giovana Romani é divertido e organizado</p>
        <span class="btn-publicacao">Ver publicação →</span>
      </div>
    </a>

    <a href="https://paisefilhos.com.br/crianca/cores-moveis-e-carinho-conheca-o-quarto-que-reflete-a-personalidade-de-benjamin/" target="_blank" class="pub-card">
      <div class="pub-img">
        <img src="{{ asset('pingo-decor/assets/img/image.png') }}" alt="">
      </div>
      <div class="pub-info">
        <h3>QUARTO BENJAMIN</h3>
        <p>Conheça o quarto que reflete a personalidade de Benjamin</p>
        <span class="btn-publicacao">Ver publicação →</span>
      </div>
    </a>

    <a href="https://www.melhorlugar.blog.br/post/marcenaria-planejada-organiza-quarto-infantil" target="_blank" class="pub-card">
      <div class="pub-img">
        <img src="{{ asset('pingo-decor/assets/img/_mg_1415.jpg') }}" alt="">
      </div>
      <div class="pub-info">
        <h3>PROJETO TAÍS FALEIROS</h3>
        <p>Marcenaria planejada organiza quarto infantil</p>
        <span class="btn-publicacao">Ver publicação →</span>
      </div>
    </a>

    <a href="https://www.melhorlugar.blog.br/post/dicas-para-projetar-quartos-infantis" target="_blank" class="pub-card">
      <div class="pub-img">
        <img src="{{ asset('pingo-decor/assets/brinquedoteca gael, theo e sofia/_mg_0190.jpg') }}" alt="">
      </div>
      <div class="pub-info">
        <h3>DICAS PARA PROJETAR QUARTOS INFANTIS</h3>
        <p>Quarto de criança deve ser funcional, bonito e seguro.</p>
        <span class="btn-publicacao">Ver publicação →</span>
      </div>
    </a>

    <a href="https://revistadecor.com.br/now/casa-muskinha-apresenta-espacos-assinados-por-grandes-nomes-da-arquitetura-e-do-design/" target="_blank" class="pub-card">
      <div class="pub-img">
        <img src="{{ asset('pingo-decor/assets/img/brinquedoteca.jpg') }}" alt="Casa Muskinha">
      </div>
      <div class="pub-info">
        <h3>CASA MUSKINHA</h3>
        <p>Espaços assinados por grandes nomes da arquitetura e design</p>
        <span class="btn-publicacao">Ver publicação →</span>
      </div>
    </a>

  </div>

</section>
@endsection
