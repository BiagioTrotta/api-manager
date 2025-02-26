<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save">
        <input type="hidden" wire:model="article_id">

        <div class="mb-3">
            <label for="title" class="form-label">Titolo Articolo</label>
            <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea wire:model="content" class="form-control @error('content') is-invalid @enderror"></textarea>
            @error('content') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">URL Immagine</label>
            <input type="text" wire:model="img" class="form-control @error('img') is-invalid @enderror"
                   placeholder="Inserisci l'URL dell'immagine">
            @error('img') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Autore</label>
            <select wire:model="user_id" class="form-select @error('user_id') is-invalid @enderror">
                <option value="">Seleziona un autore</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select wire:model="category_id" class="form-select @error('category_id') is-invalid @enderror">
                <option value="">Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Salva Articolo</button>
            <button type="button" wire:click="resetForm" class="btn btn-secondary">Nuovo Articolo</button>
        </div>
    </form>
</div>
