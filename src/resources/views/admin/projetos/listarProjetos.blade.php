<div class="admin-card">
    <div class="admin-card-header">
        <div>
            <h2>Projetos</h2>
            <p>Gerenciamento de Projetos cadastrados no sistema.</p>
        </div>
        <span class="admin-tag">{{ $listarProjetos->count() }} registros</span>
    </div>

    <div class="admin-filter-row">
        <div class="admin-search-fake" aria-label="Busca de Projetos">
            <span aria-hidden="true">&#128269;</span> Buscar Projetos...
        </div>
        <div class="admin-filter-fake" aria-label="Filtros de Projetos">
            <span class="selected">Todos</span><span>Ativos</span><span>Inativos</span>
        </div>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>

                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($listarProjetos as $projetos)
                    <tr>
                        <td><span class="cell-primary">{{ $projetos->id_projetos }}</span></td>



                        <td><span class="cell-primary">{{ $projetos->nome_projetos }}</span></td>

                        <td>
                            <img class="cell-image" src="{{ asset('pingo-decor/assets/' . ltrim($projetos->imagem_projetos, '/')) }}"
                                alt="Foto de {{ $projetos->nome_projetos }}" loading="lazy">
                        </td>


                        <td>
                            @php($statusProjeto = trim((string) $projetos->status_projetos))
                            <span class="admin-status {{ mb_strtolower($statusProjeto) === 'inativo' ? 'inactive' : 'published' }}">
                                {{ $statusProjeto }}
                            </span>
                        </td>

                        <td>
                            <div class="admin-actions">
                                <button type="button" class="admin-action"
                                    data-admin-modal-open="modalEditarProjetos{{ $projetos->id_projetos }}"
                                    aria-haspopup="dialog">Editar</button>

                                <button type="button" class="admin-action admin-action-danger"
                                    data-admin-modal-open="modalExcluirProjetos{{ $projetos->id_projetos }}"
                                    aria-haspopup="dialog">Excluir</button>

                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5">Nenhum projeto cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="admin-card-footer">Total de projetos: {{ $listarProjetos->count() }}</div>
</div>

<x-admin.modal id="modalCriarProjetos" title="Criar projeto">

    <form
        class="admin-form"
        id="formCriarProjetos"
        action="{{ route('admin.projetos.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        <div class="admin-form-grid">
            <div class="admin-field">
                <label for="criarNomeProjetos">Nome</label>
                <input id="criarNomeProjetos" name="nome_projetos" type="text" placeholder="Nome do projeto" required>
            </div>

             <div class="admin-field admin-field-full">
                <label for="criarFotoProjetos">Imagem</label>
                <input id="criarFotoProjetos" name="imagem_projetos" type="file" accept="image/*" required>
            </div>
            
            
            <div class="admin-field">
                <label for="criarStatusProjetos">Status</label>
                <select id="criarStatusProjetos" name="status_projetos" required>
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>
            </div>
           
        </div>
    </form>

    <x-slot name="footer">
        <button type="button" class="admin-outline-btn" data-admin-modal-close>Cancelar</button>
        <button type="submit" class="admin-primary-btn" form="formCriarProjetos">Criar projeto</button>
    </x-slot>
</x-admin.modal>

@foreach ($listarProjetos as $projetos)
    <x-admin.modal id="modalEditarProjetos{{ $projetos->id_projetos }}" title="Editar projeto">

        <form
            class="admin-form"
            id="formEditarProjetos{{ $projetos->id_projetos }}"
            action="{{ route('admin.projetos.update', $projetos->id_projetos) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="admin-form-grid">

                <div class="admin-field">

                    <label for="editarNomeprojetos{{ $projetos->id_projetos }}">Nome</label>

                    <input id="editarNomeprojetos{{ $projetos->id_projetos }}" name="nome_projetos" type="text"

                        value="{{ data_get($projetos, 'nome_projetos') }}" required>
                        
                </div>

                <div class="admin-field">
                    <label for="editarFotoprojetos{{ $projetos->id_projetos }}">Substituir imagem</label>
                    <input id="editarFotoprojetos{{ $projetos->id_projetos }}" name="imagem_projetos" type="file"
                        accept="image/*">
                </div>


                <div class="admin-field">
                    <label for="editarStatusprojetos{{ $projetos->id_projetos }}">Status</label>
                    <select id="editarStatusprojetos{{ $projetos->id_projetos }}" name="status_projetos" required>
                        <option value="Ativo" @selected(mb_strtolower((string) $projetos->status_projetos) === 'ativo')>Ativo
                        </option>
                        <option value="Inativo" @selected(mb_strtolower((string) $projetos->status_projetos) === 'inativo')>
                            Inativo</option>
                    </select>
                </div>

                
            </div>
        </form>

        <x-slot name="footer">
            <button type="button" class="admin-outline-btn" data-admin-modal-close>Cancelar</button>
            <button type="submit" class="admin-primary-btn" form="formEditarProjetos{{ $projetos->id_projetos }}">Salvar alterações</button>
        </x-slot>

    </x-admin.modal>

    <x-admin.modal id="modalExcluirProjetos{{ $projetos->id_projetos }}" title="Excluir projeto" size="small" variant="danger">
        <form
            id="formExcluirProjetos{{ $projetos->id_projetos }}"
            action="{{ route('admin.projetos.destroy', $projetos->id_projetos) }}"
            method="POST"
        >
            @csrf
            @method('DELETE')
        </form>

        <div class="admin-delete-message">
            <span class="admin-delete-icon" aria-hidden="true">!</span>
            <div>
                <p>Tem certeza que deseja excluir <strong>{{ data_get($projetos, 'nome_projetos') }}</strong>?</p>
                <small>Esta ação não poderá ser desfeita.</small>
            </div>
        </div>

        <x-slot name="footer">
            <button type="button" class="admin-outline-btn" data-admin-modal-close>Cancelar</button>
            <button type="submit" class="admin-danger-btn" form="formExcluirProjetos{{ $projetos->id_projetos }}">Excluir projeto</button>
        </x-slot>
    </x-admin.modal>
@endforeach
