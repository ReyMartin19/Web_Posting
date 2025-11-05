<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Laravel'))</title>   
    @vite('resources/css/app.css')
</head>
<body class="h-full">
    <div class="min-h-full">
        <!-- Desktop/Laptop Navigation -->
        <nav class="bg-gray-800/50 backdrop-blur-sm border-b border-white/10">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Left Section: Logo, Home, Post -->
                    <div class="flex items-center space-x-4">
                        <!-- Logo -->   
                        <div class="shrink-0">
                            <a href="/home"><img src="{{ asset('images/worlwide.png') }}" alt="Your Company" class="size-8" /></a>
                        </div>
                        
                        <!-- Home Link -->
                        <x-nav-link 
                            href="/home" 
                            :active="request()->is('home')"
                            class="hidden md:flex items-center gap-2 font-medium px-3 py-2 rounded-lg transition">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 fill="none" 
                                 viewBox="0 0 24 24" 
                                 stroke-width="1.5" 
                                 stroke="currentColor" 
                                 class="w-5 h-5">
                                <path stroke-linecap="round" 
                                      stroke-linejoin="round" 
                                      d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <span>Home</span>
                        </x-nav-link>
                        
                        <!-- Post Link -->
                        <x-nav-link 
                            href="/post" 
                            :active="request()->is('post*')"
                            class="hidden md:flex items-center gap-2 font-medium px-3 py-2 rounded-lg transition">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 fill="none" 
                                 viewBox="0 0 24 24" 
                                 stroke-width="1.5" 
                                 stroke="currentColor" 
                                 class="w-5 h-5">
                                <path stroke-linecap="round" 
                                      stroke-linejoin="round" 
                                      d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                            </svg>
                            <span>Posts</span>
                        </x-nav-link>
                    </div>
                    
                    <!-- Center Section: Search Bar -->
                    <div class="hidden md:flex flex-1 max-w-md mx-8">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" class="block w-full p-2 pl-10 text-sm rounded-lg bg-gray-700 border border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
                        </div>
                    </div>
                    
                    <!-- Right Section: Create, Logout -->
                    <div class="hidden md:flex items-center space-x-3">
                        <a href="/post/create" 
                           class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition">
                            Create Post
                        </a>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg transition">
                                Log out
                            </button>
                        </form>
                    </div>
                    
                    <!-- Mobile Top Section: Logo and Logout -->
                    <div class="flex md:hidden items-center justify-between w-full">
                        <!-- Logo -->
                        <div class="shrink-0">
                            <img src="{{ asset('images/worlwide.png') }}" alt="Your Company" class="size-8" />
                        </div>
                        
                        <!-- Logout Button -->
                        <form action="/logout" method="POST" class="m-0">
                            @csrf
                            <button type="submit" 
                                    class="flex items-center gap-1 p-2 rounded-lg transition hover:bg-white/10 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                     fill="none" 
                                     viewBox="0 0 24 24" 
                                     stroke-width="1.5" 
                                     stroke="currentColor" 
                                     class="w-5 h-5">
                                    <path stroke-linecap="round" 
                                          stroke-linejoin="round" 
                                          d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                </svg>
                                <span class="text-sm">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Mobile Bottom Navigation -->
        <div class="md:hidden fixed bottom-0 left-0 right-0 bg-gray-800/95 backdrop-blur-sm border-t border-white/10 z-50">
            <div class="flex items-center justify-around h-16 px-4">
                <!-- Home Icon -->
                <x-nav-link 
                    href="/home" 
                    :active="request()->is('home')"
                    class="flex flex-col items-center justify-center gap-1 p-2 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke-width="1.5" 
                         stroke="currentColor" 
                         class="w-6 h-6">
                        <path stroke-linecap="round" 
                              stroke-linejoin="round" 
                              d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <span class="text-xs">Home</span>
                </x-nav-link>
                
                <!-- Search Icon -->
                <a href="#" 
                   class="flex flex-col items-center justify-center gap-1 p-2 rounded-lg transition hover:bg-white/10 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke-width="1.5" 
                         stroke="currentColor" 
                         class="w-6 h-6">
                        <path stroke-linecap="round" 
                              stroke-linejoin="round" 
                              d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <span class="text-xs">Search</span>
                </a>
                
                <!-- Posts Icon -->
                <x-nav-link 
                    href="/post" 
                    :active="request()->is('post') && !request()->is('post/create')"
                    class="flex flex-col items-center justify-center gap-1 p-2 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke-width="1.5" 
                         stroke="currentColor" 
                         class="w-6 h-6">
                        <path stroke-linecap="round" 
                              stroke-linejoin="round" 
                              d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                    </svg>
                    <span class="text-xs">Posts</span>
                </x-nav-link>
                
                <!-- Create Icon -->
                <x-nav-link 
                    href="/post/create" 
                    :active="request()->is('post/create')"
                    class="flex flex-col items-center justify-center gap-1 p-2 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke-width="1.5" 
                         stroke="currentColor" 
                         class="w-6 h-6">
                        <path stroke-linecap="round" 
                              stroke-linejoin="round" 
                              d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span class="text-xs">Create</span>
                </x-nav-link>
            </div>
        </div>
        
        <!-- Add padding to body for mobile bottom nav -->
        <div class="md:hidden h-16"></div>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>