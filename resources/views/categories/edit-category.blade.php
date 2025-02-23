<x-main>
    <x-slot:title>Edit Category</x-slot:title>

    <div class="container mt-5">
        <h3>Edit Category</h3>
        <form action="{{ route('page.updateCategory', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update Category</button>
        </form>
    </div>
</x-main>