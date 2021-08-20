<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>@yield('doctitle')</title>
    <style>
        .active{color:red;font-weight: bold;}
    </style>
</head>
<body>
    @include('layouts.partials.header')

    @yield('bodycontent')

    @include('layouts.partials.footer')
</body>
</html>