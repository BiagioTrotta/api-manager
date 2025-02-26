<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mt-5">
        <!-- Tabella Users -->
        <h3 class="mb-4">
            Users ({{ $users->count() }})
            <a href="{{ url('/api/users') }}" target="_blank" class="btn btn-sm btn-info">View API <i class="fa-solid fa-eye"></i></a>
        </h3>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('page.editUser', $user->id) }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('page.destroyUser', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tabella Categories -->
        <h3 class="mb-4">
            Categories ({{ $categories->count() }})
            <a href="{{ url('/api/categories') }}" target="_blank" class="btn btn-sm btn-info">View API <i class="fa-solid fa-eye"></i></a>
        </h3>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('page.editCategory', $category->id) }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('page.destroyCategory', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tabella Articles -->
        <h3 class="mb-4">
            Articles ({{ $articles->count() }})
            <a href="{{ url('/api/articles') }}" target="_blank" class="btn btn-sm btn-info">View API <i class="fa-solid fa-eye"></i></a>
        </h3>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category ? $article->category->name : 'No category' }}</td>
                    <td>{{ $article->content }}</td>
                    <td><img src="{{ $article->img }}" alt=""></td>
                    <td>
                        <a href="{{ route('page.editArticle', $article->id) }}" class="btn btn-sm btn-primary mb-2">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('page.destroyArticle', $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-main>