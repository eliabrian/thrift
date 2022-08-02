<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thrift</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @include('layouts._styles')
    @include('layouts._scripts')
</head>
<body>
    <x-navbar/>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>