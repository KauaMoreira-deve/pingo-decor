@extends('layout.admin')

@section('actions')
    <button
        type="button"
        class="admin-primary-btn"
        data-admin-modal-open="modalCriarPublicacao"
        aria-haspopup="dialog"
    >+ Nova publicação</button>
@endsection

@section('content')
    @include('admin.publicacoes.listarPublicacoes')
@endsection
