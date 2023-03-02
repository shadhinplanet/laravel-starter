<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/backend/auth/auth.css?ts={{ time() }}">
</head>
<body>

    @yield('content')

    <script type="module" src="/backend/auth/ionicons.esm.js"></script>
    <script nomodule src="/backend/auth/ionicons.js"></script>
</body>
</html>
