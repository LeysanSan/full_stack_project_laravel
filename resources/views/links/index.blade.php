<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>All Links</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">

            <h1 class="text-center">All Shortened Links</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive d-flex justify-content-center">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Original URL</th>
                            <th>Short URL</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($links as $link)
                            <tr>
                                <td>{{ $link->id }}</td>
                                <td>{{ $link->original_url }}</td>
                                <td>
                                    <a href="{{ route('links.redirect', ['slug' => $link->slug]) }}">
                                        {{ route('links.redirect', ['slug' => $link->slug]) }}
                                    </a>
                                </td>
                                <td>

                                    <form action="{{ route('links.destroy', $link->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $links->links('pagination::bootstrap-5') }}
        </div>

        <div class="text-center">
            <a href="{{ route('links.create') }}" class="btn btn-success">Shorten New Link</a>
        </div>
</body>

</html>
