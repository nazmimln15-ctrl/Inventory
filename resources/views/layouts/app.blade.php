<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>INVENTORY</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('items.index') }}">INVENTORY</a>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
