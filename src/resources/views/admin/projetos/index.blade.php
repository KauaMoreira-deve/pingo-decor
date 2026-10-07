@extends('layout.admin')

@section('actions')
    <button
        type="button"
        class="admin-primary-btn"
        data-admin-modal-open="modalCriarProjetos"
        aria-haspopup="dialog"
    >+ Novo projeto</button>
@endsection

@section('content')
    @include('admin.projetos.listarProjetos')
@endsection
