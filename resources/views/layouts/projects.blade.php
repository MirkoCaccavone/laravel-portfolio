<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite(['resources/sass/show.scss', 'resources/js/app.js']) --}}
    @yield('vite')
    <title>Project</title>
</head>
<body class="@yield('body-class')">
    <div class="container">
        <h1>
            @yield('title')
        </h1>

        @yield('content')
    
    </div>
</body>
</html>