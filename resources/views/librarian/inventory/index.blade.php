<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Library Inventory</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Books</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($books as $book)
                    <li class="list-group-item">{{ $book->title }} - {{ $book->author }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Repeat for other inventory types like CDs, Journals, Newspapers, Theses -->
     
    <form action="{{ route('librarian.create-reservation') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="user_id">Student</label>
        <select name="user_id" id="user_id" class="form-control">
            @foreach ($users as $user) <!-- Assuming you pass users from the controller -->
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="inventory_id">Book</label>
        <select name="inventory_id" id="inventory_id" class="form-control">
            @foreach ($books as $book) <!-- Assuming you pass books from the controller -->
                <option value="{{ $book->id }}">{{ $book->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="due_date">Due Date</label>
        <input type="date" name="due_date" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Create Reservation</button>
</form>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
