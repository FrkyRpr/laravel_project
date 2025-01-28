<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('user_role.update', $user->id) }}" method="POST" class="p-4 border rounded">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="username" class="form-control" value="{{ $user->username }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="firstname" class="form-label">Firstname:</label>
                <input type="text" id="firstname" name="firstname" class="form-control" value="{{ $user->firstname }}" required>
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname:</label>
                <input type="text" id="lastname" name="lastname" class="form-control" value="{{ $user->lastname }}" required>
            </div>
            <div class="mb-3">
                <label for="name_ext" class="form-label">Name Extender:</label>
                <input type="text" id="name_ext" name="name_ext" class="form-control" value="{{ $user->name_ext }}">
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select id="gender" name="gender" class="form-select">
                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select id="status" name="status" class="form-select">
                    <option value="Active" {{ $user->status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $user->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
