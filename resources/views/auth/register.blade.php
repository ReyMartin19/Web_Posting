@extends('layouts.guest')
@section('content')

        <div class="hidden lg:flex w-1/2 bg-[#0b0f1a]/80 backdrop-blur-sm items-center justify-center p-12 border-none rounded-lg">
            <div class="max-w-md text-center">
                <h1 class="text-3xl font-extrabold mb-4">Connect with the world.</h1>
                <p class="text-gray-300 text-base leading-relaxed">
                    Explore, share, and build meaningful connections across the globe.
                    Join a thriving community where your ideas matter.
                </p>
            </div>
        </div>
        
        <div class="flex flex-col justify-center items-center w-full  lg:w-1/2 px-10 py-12">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <a href="/"><img src="{{ asset('images/worlwide.png') }}" alt="Your Company"
                    class="mx-auto h-10 w-auto" />
                </a>
                <h2 class="mt-6 text-center text-2xl/9 font-bold tracking-tight text-white">Create an account account</h2>
            </div>

            <div class="mt-4  sm:mx-8 sm:w-full sm:max-w-sm">
                <form action="/register" method="POST" class="space-y-4 ">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm/6 font-medium text-gray-100">Name</label>
                        <div class="mt-2 relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="fa-solid fa-user text-gray-400" aria-hidden="true"></i>
                            </div>
                            <input id="name" type="name" name="name" required autocomplete="name"
                                class="block w-full rounded-md bg-white/5 pl-10 pr-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                        </div>
                        <x-form-error name="name" />
                    </div>

                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-100">Email address</label>
                        <div class="mt-2 relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="fa-solid fa-envelope text-gray-400" aria-hidden="true"></i>
                            </div>
                            <input id="email" type="email" name="email" required autocomplete="email"
                                class="block w-full rounded-md bg-white/5 pl-10 pr-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                        </div>
                        <x-form-error name="email" />
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm/6 font-medium text-gray-100">Password</label>
                        </div>
                        <div class="mt-2 relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="fa-solid fa-lock text-gray-400" aria-hidden="true"></i>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                class="block w-full rounded-md bg-white/5 pl-10 pr-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                        </div>
                        <x-form-error name="password" />
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-100">Confirm
                                Password</label>
                        </div>
                        <div class="mt-2 relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="fa-solid fa-key text-gray-400" aria-hidden="true"></i>
                            </div>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                autocomplete="current-password"
                                class="block w-full rounded-md bg-white/5 pl-10 pr-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Register
                        </button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm/6 text-gray-400">
                    Already have an account?
                    <a href="/login" class="font-semibold text-indigo-400 hover:text-indigo-300">Log in</a>
                </p>
            </div>
        </div>
@endsection