<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Manage Reservations</h1>

    @if($reservations->isEmpty())
        <p>No reservations found.</p>
    @else
        @foreach($reservations as $reservation)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $reservation->book->title }}</h5>
                    <p class="card-text">{{ $reservation->user->name }}</p>
                    <form action="{{ route('librarian.approve-reservation', ['reservation' => $reservation->id]) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-primary">Approve</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
