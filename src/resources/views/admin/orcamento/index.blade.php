@extends('layout.admin')

@section('title', 'Orçamentos | Painel Pingo Decor')
@section('navtitle', 'Orçamentos')
@section('eyebrow', 'GESTÃO COMERCIAL')
@section('heading', 'Orçamentos')
@section('description', 'Acompanhe propostas, valores, prazos e o andamento de cada projeto.')

@section('actions')
    <button
        type="button"
        class="admin-primary-btn"
        data-admin-modal-open="modalNovoOrcamento"
        aria-haspopup="dialog"
    >+ Novo orçamento</button>
@endsection

@section('content')
    @include('admin.orcamento.listarOrcamento')
@endsection
