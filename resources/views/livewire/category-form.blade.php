<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save">
        <input type="hidden" wire:model="category_id">

        <div class="mb-3">
            <label for="name" class="form-label">Nome Categoria</label>
            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Salva</button>
            <button type="button" wire:click="resetForm" class="btn btn-secondary">Nuova Categoria</button>
        </div>
    </form>
</div>
