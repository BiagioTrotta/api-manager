<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Categoria</th>
                <th>Immagine</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->user->name }}</td>
                    <td>{{ $article->category->name }}</td>
                    <td><img src="{{ $article->img }}" alt="Immagine" style="width: 100px; height: auto;"></td>
                    <td>
                        <button class="btn btn-warning btn-sm" wire:click="edit({{ $article->id }})"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-danger btn-sm" wire:click="delete({{ $article->id }})"
                            onclick="return confirm('Sei sicuro di voler eliminare questo articolo?')"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
