@props([
    'id',
    'title',
    'size' => 'medium',
    'variant' => 'default',
])

<div
    id="{{ $id }}"
    class="admin-modal"
    role="dialog"
    aria-modal="true"
    aria-hidden="true"
    aria-labelledby="{{ $id }}-title"
    hidden
>
    <button
        type="button"
        class="admin-modal-backdrop"
        data-admin-modal-close
        aria-label="Fechar modal"
    ></button>

    <div
        class="admin-modal-dialog admin-modal-dialog-{{ $size }} {{ $variant === 'danger' ? 'admin-modal-dialog-danger' : '' }}"
        tabindex="-1"
    >
        <div class="admin-modal-header">
            <div>
                <p class="admin-modal-eyebrow">Painel administrativo</p>
                <h2 id="{{ $id }}-title">{{ $title }}</h2>
            </div>

            <button
                type="button"
                class="admin-modal-close"
                data-admin-modal-close
                aria-label="Fechar modal"
            >&times;</button>
        </div>

        <div class="admin-modal-body">
            {{ $slot }}
        </div>

        @isset($footer)
            <div class="admin-modal-footer">
                {{ $footer }}
            </div>
        @endisset
    </div>
</div>
