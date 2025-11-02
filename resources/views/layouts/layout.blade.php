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
        <nav class="bg-gray-800/50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex w-full justify-between">
                        <div class="flex items-center">
                            <div class="shrink-0">
                                <img src="{{ asset('images/worlwide.png') }}"
                                    alt="Your Company" class="size-8" />
                            </div>
                            @auth
                                <div class="hidden md:block">
                                    <div class="ml-10 flex items-baseline space-x-4">
                                        <x-nav-link href="/home"  :active="request()->is('/home')" class="font-medium p-3 py-2 rounded-lg">Home</x-nav-link>
                                        <x-nav-link href="/post" :active="request()->is('post')" class="font-medium p-3 py-2 rounded-lg">Post</x-nav-link>
                                    </div>
                                </div>
                            @endauth
                        </div>
                        <div class="flex items-center gap-3">
                            <div>
                                @auth
                                    <x-button href="/post/create" >Create Post</x-button>
                                @endauth
                            </div>

                            <div class="flex gap-3">
                                @auth
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <x-form-button>Log out</x-form-button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </nav>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>

    </div>
</body>

</html>