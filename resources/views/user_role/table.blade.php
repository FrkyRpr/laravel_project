<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">User List</h1>

        <!-- Back to Form Button -->
        <a href="{{ route('user_role.index') }}" class="btn btn-primary mb-3">Back to Form</a>

        <!-- User Table -->
        @if ($users->isEmpty())
            <p class="text-muted">No users found.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Name Extender</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Actions</th> <!-- Added Actions column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr id="user-{{ $user->id }}">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->name_ext }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->status }}</td>
                            <td>
                                <button class="btn btn-success btn-sm edit-btn" data-url="{{ route('user_role.edit', $user->id) }}">Edit</button>

                            </td>
                            <td>
                                <!-- Delete Button -->
                                <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $user->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Delete User with AJAX
        $(document).on('click', '.delete-btn', function() {
            var userId = $(this).data('id');
            
            // Confirm delete
            if (confirm('Are you sure you want to delete this user?')) {
                $.ajax({
                    url: '/user_role/' + userId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',  // Include CSRF token
                    },
                    success: function(response) {
                        // On success, remove the user row from the table
                        $('#user-' + userId).remove();
                        alert(response.success);  // Display success message
                    },
                    error: function(xhr, status, error) {
                        alert('Error deleting user: ' + error);
                    }
                });
            }
        });
    </script>

    <script>
        $(document).on('click', '.edit-btn', function() {
            var url = $(this).data('url');
            window.location.href = url;
        });
    </script>
</body>
</html>
