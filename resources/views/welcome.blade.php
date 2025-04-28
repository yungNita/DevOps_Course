<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <h1 class="text-4xl font-bold text-gray-800">Welcome to Laravel</h1>
    </div>
</body>
</html>
