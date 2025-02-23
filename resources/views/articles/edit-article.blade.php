<x-main>
    <x-slot:title>Edit Article</x-slot:title>

    <div class="container mt-5">
        <h3>Edit Article</h3>
        <form action="{{ route('page.updateArticle', $article->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ $article->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update Article</button>
        </form>
    </div>
</x-main>