<!DOCTYPE html>
<html lang="en"  class="h-full bg-gray-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <div class="min-h-full">        
        <main>
            <div class="flex h-screen items-center justify-center">
                @yield('content')
            </div>
        </main>

    </div>
</body>

</html>