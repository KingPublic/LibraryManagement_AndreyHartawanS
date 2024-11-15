<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Hangus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJd3gL3vvn8a5S9u48sKKfrfo0x1uKCb0Xw6cuI1jZ+V9yDbpE3WVzQ1h0pD" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Item Hangus</h1>

        @if($overdueItems->isEmpty())
            <div class="alert alert-info">
                <p>Tidak ada item yang hangus.</p>
            </div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Publisher</th>
                        <th>Publication Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($overdueItems as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->publisher }}</td>
                            <td>{{ $item->publication_date->format('d-m-Y') }}</td>
                            <td>
                                <span class="badge bg-danger">Hangus</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0p5htrq20I6UsV9fK5f6Iu1jRpmzFjfXk59vFIk/xygDuxyXl" crossorigin="anonymous"></script>
</body>
</html>
