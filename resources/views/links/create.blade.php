<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shorten Link</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body class="container py-5">
    <h1 class="mb-4">Shorten a New Link</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('links.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="original_url" class="form-label">Original URL</label>
            <input type="text" name="original_url" id="original_url" class="form-control" placeholder="https://example.com" required>
        </div>
        <button type="submit" class="btn btn-success">Shorten</button>
        <a href="{{ route('links.index') }}" class="btn btn-secondary ms-2">Back to All Links</a>
    </form>
</body>

</html>

