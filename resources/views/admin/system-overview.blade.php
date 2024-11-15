<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>System Overview</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h5>System Statistics</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">Total Users: {{ $totalUsers }}</li>
                <li class="list-group-item">Total Books: {{ $totalBooks }}</li>
                <li class="list-group-item">Total CDs: {{ $totalCDs }}</li>
                <li class="list-group-item">Total Journals: {{ $totalJournals }}</li>
                <li class="list-group-item">Total Theses (Skripsi): {{ $totalTheses }}</li>
                <li class="list-group-item">Total Newspapers (Koran): {{ $totalNewspapers }}</li>
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
