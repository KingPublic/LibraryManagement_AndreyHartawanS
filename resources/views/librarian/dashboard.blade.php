<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Welcome, {{ session('user')['name'] }}!</h1>
    <p>You are logged in as a Librarian.</p>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Librarian Controls</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('librarian.manage-library') }}">Manage Library Inventory</a>
                </li>
                <li class="list-group-item">
                    @if($reservation) <!-- Check if reservation is passed -->
                        <form action="{{ route('librarian.approve-reservation', ['reservation' => $reservation->id]) }}" method="POST">
                            @csrf
                            <button type="submit">Approve</button>
                        </form>
                    @else
                        <p>No reservations available to approve.</p>
                    @endif
                </li>

                <li class="list-group-item">
                    <a href="{{ route('librarian.handle-overdue') }}">Handle Overdue Books</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
