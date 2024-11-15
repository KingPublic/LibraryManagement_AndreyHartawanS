<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Librarians</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Manage Librarians</h1>

    <!-- Button to Add Librarian -->
    <a href="{{ route('admin.create-librarian') }}" class="btn btn-success mb-3">Add Librarian</a>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Librarians List</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($librarians as $librarian)
                        <tr>
                            <td>{{ $librarian->name }}</td>
                            <td>{{ $librarian->email }}</td>
                            <td>
                                <!-- Add actions like Edit, Delete, etc. -->
                                <a href="{{ route('admin.edit-librarian', $librarian->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.delete-librarian', $librarian->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
