<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save">
        <input type="hidden" wire:model="user_id">

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telefono</label>
            <input type="text" wire:model="phone" class="form-control @error('phone') is-invalid @enderror">
            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Genere</label>
            <select wire:model="gender" class="form-control @error('gender') is-invalid @enderror">
                <option value="">Seleziona</option>
                <option value="male">Maschio</option>
                <option value="female">Femmina</option>
                <option value="other">Altro</option>
            </select>
            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Salva</button>
            <button type="button" wire:click="resetForm" class="btn btn-secondary">Nuovo Utente</button>
        </div>
    </form>
</div>