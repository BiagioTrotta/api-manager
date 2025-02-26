<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <livewire:user-form />
            </div>
            <div class="col-6">
                <livewire:user-table />
            </div>
        </div>
    </div>
</x-main>