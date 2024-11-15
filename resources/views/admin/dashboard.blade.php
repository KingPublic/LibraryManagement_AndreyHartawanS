<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Library Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Welcome, {{ session('user')['name'] }}!</h1>
    <p>You are logged in as an Admin.</p>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Admin Controls</h5>
        </div>
        <div class="card-body">
            <div class="list-group">
                <a href="{{ route('admin.manage-librarians') }}" class="list-group-item list-group-item-action">Manage Librarians</a>
                <a href="{{ route('admin.collection-requests') }}" class="list-group-item list-group-item-action">Approve or Reject Collection Update Requests</a>
                <a href="{{ route('admin.system-overview') }}" class="list-group-item list-group-item-action">System Overview</a>
                <a href="{{ route('admin.manage-permissions') }}" class="list-group-item list-group-item-action">Manage Permissions</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
