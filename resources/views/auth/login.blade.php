@extends('layouts.guest')

@section('content')

    <!-- Left: Login Form -->
    <div class="flex flex-col justify-center items-center w-full lg:w-1/2 px-8 py-12">
        <div class="w-full max-w-sm">
            <div class="flex justify-center mb-6">
               <a href="/"><img src="{{ asset('images/worlwide.png') }}" alt="Your Company" class="h-12 w-auto"></a> 
            </div>
            <h2 class="text-center text-2xl font-bold mb-8">Sign in</h2>

            <form action="/login" method="POST" class="space-y-6">
                @csrf
                <x-form-error name="email" />
                <x-form-error name="password" />

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email address</label>
                    <div class="mt-2 relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fa-solid fa-envelope text-gray-400" aria-hidden="true"></i>
                        </div>
                        <input id="email" type="email" name="email" required
                            class="block w-full rounded-md bg-[#1a1f2e] pl-10 pr-3 py-2 text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                        <a href="#" class="text-sm text-indigo-400 hover:text-indigo-300">Forgot password?</a>
                    </div>
                    <div class="mt-2 relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fa-solid fa-lock text-gray-400" aria-hidden="true"></i>
                        </div>
                        <input id="password" type="password" name="password" required
                            class="block w-full rounded-md bg-[#1a1f2e] pl-10 pr-3 py-2 text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>
                </div>

                <button type="submit"
                    class="w-full rounded-md bg-indigo-600 py-2 font-semibold hover:bg-indigo-500 transition duration-200">
                    Sign in
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-400">
                Not a member?
                <a href="/register" class="font-semibold text-indigo-400 hover:text-indigo-300">Register</a>
            </p>
        </div>
    </div>

    <!-- Right: Text Context -->
    <div class="hidden lg:flex w-1/2 bg-[#0b0f1a]/80 backdrop-blur-sm items-center justify-center p-12 border-none rounded-lg">
        <div class="max-w-md text-center">
            <h1 class="text-3xl font-extrabold mb-4">Connect with the world.</h1>
            <p class="text-gray-300 text-base leading-relaxed">
                Explore, share, and build meaningful connections across the globe.  
                Join a thriving community where your ideas matter.
            </p>
        </div>
    </div>

@endsection
