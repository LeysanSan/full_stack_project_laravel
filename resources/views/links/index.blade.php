<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Links</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

</head>

<body class="container py-5">
    <h1 class="mb-4">All Shortened Links</h1>
    <a href="{{ route('links.create') }}" class="btn btn-primary mb-3">Shorten New Link</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Original URL</th>
                <th>Shortened URL</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($links as $link)
                <tr>
                    <td>{{ $link->original_url }}</td>
                    <td><a href="{{ url($link->slug) }}">{{ url($link->slug) }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
