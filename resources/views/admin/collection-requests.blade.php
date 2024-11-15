<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection Update Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Pending Collection Update Requests</h1>

    <div class="list-group mt-3">
        @foreach($pendingApprovals as $approval)
            <div class="list-group-item">
                <h5>{{ $approval->title }} - Request from {{ $approval->librarian->name }}</h5>
                <p>Status: {{ $approval->status }}</p>
                
                <form action="{{ route('admin.approve-inventory', $approval->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-success">Approve</button>
                </form>

                <form action="{{ route('admin.reject-inventory', $approval->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Reject</button>
                </form>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
