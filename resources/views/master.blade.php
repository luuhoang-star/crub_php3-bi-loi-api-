<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Quản lý Sinh viên')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h2 class="mb-0 text-primary">@yield('title')</h2>
            </div>
            <div class="card-body">
                @include('partials.alerts')
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>

