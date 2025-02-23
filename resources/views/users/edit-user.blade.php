<x-main>
    <x-slot:title>Edit User</x-slot:title>

    <div class="container mt-5">
        <h3>Edit User</h3>
        <form action="{{ route('page.updateUser', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update User</button>
        </form>
    </div>
</x-main>