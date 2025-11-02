<!DOCTYPE html>
<html lang="en"  class="h-full bg-gray-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <div class="min-h-full">        
        <main>
            <div class="flex h-screen items-center justify-center">
                <div class="hidden lg:block absolute top-50 left-320 w-40 h-40 bg-red-900 rounded-full blur-sm -z-10">
                </div>
                <div class="hidden lg:block absolute top-130 left-150 w-40 h-40 bg-red-900 rounded-full blur-sm -z-10">
                </div>
                <div class="flex bg-white/10 backdrop-blur-md text-white sm:rounded-2xl rounded-3xl shadow-xl">
                    @yield('content')
                </div>
            </div>
        </main>

    </div>
</body>

</html>