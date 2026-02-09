<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Y-done</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased bg-[#fdfaf6] text-gray-900">

        <nav class="bg-white/90 backdrop-blur-md border-b border-orange-100 sticky top-0 z-50 shadow-sm" x-data="{ open: false }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    
                    <div class="flex items-center">
                        <a href="/" class="flex items-center space-x-2 group">
                            <span class="text-3xl transition-transform group-hover:rotate-12">🍳</span>
                            <span class="text-2xl font-black text-orange-600 tracking-tighter">Y-done</span>
                        </a>
                    </div>

                    <div class="flex items-center relative">
                        
                        <button @click="open = !open" @click.outside="open = false" 
                                class="flex items-center space-x-4 p-1 pr-4 bg-orange-50 rounded-full border border-orange-100 hover:bg-orange-100 transition-colors cursor-pointer group focus:outline-none">
                            
                            <div class="hidden sm:block text-right ml-4">
                                <p class="text-sm font-bold text-amber-950 leading-none">
                                    {{ auth()->user()->firstName }} {{ auth()->user()->familyName }}
                                </p>
                                <p class="text-[10px] font-bold text-orange-500 uppercase tracking-widest mt-1">
                                    {{ auth()->user()->role }}
                                </p>
                            </div>

                            <div class="relative">
                                @if(auth()->user()->photo)
                                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" 
                                        src="{{ asset('storage/' . auth()->user()->photo) }}" 
                                        alt="Profile">
                                @else
                                    <div class="h-10 w-10 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold border-2 border-white shadow-sm">
                                        {{ substr(auth()->user()->firstName, 0, 1) }}
                                    </div>
                                @endif
                                <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-500 ring-2 ring-white"></span>
                            </div>

                            <svg class="w-4 h-4 text-amber-900 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open" 
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 top-full mt-2 w-56 bg-white border border-orange-100 rounded-[1.5rem] shadow-2xl py-2 z-50 overflow-hidden"
                            style="display: none;">
                            
                            <a href="/profile" class="flex items-center px-4 py-3 text-sm font-bold text-amber-950 hover:bg-orange-50 hover:text-orange-600 transition-colors">
                                <span class="mr-3 text-lg">👤</span> {{ __('Profile Settings') }}
                            </a>

                            @if(auth()->user()->hasRole('owner'))
                                <a href="/my-restaurants" class="flex items-center px-4 py-3 text-sm font-bold text-amber-950 hover:bg-orange-50 hover:text-orange-600 transition-colors border-t border-orange-50">
                                    <span class="mr-3 text-lg">🏠</span> {{ __('My Restaurants') }}
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}" class="border-t border-orange-50">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-4 py-3 text-sm font-bold text-red-600 hover:bg-red-50 transition-colors">
                                    <span class="mr-3 text-lg">🚪</span> {{ __('Sign Out') }}
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </nav>

        <main>
            {{ $slot }}
        </main>

        <div id="toast-container" class="fixed top-5 right-5 z-[100] flex flex-col gap-3 w-full max-w-[320px]">

            @if (session('success'))
                <div class="toast-item flex items-center p-4 bg-orange-600 text-white rounded-xl shadow-2xl animate-in-right">
                    <div
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-white rounded-full text-[10px]">
                        <i class="fa-solid fa-check text-white"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-[11px] font-bold uppercase tracking-widest">{{ session('success') }}</p>
                    </div>
                    <button onclick="this.parentElement.remove()" class="ml-auto text-gray-500 hover:text-white">
                        <i class="fa-solid fa-xmark text-xs"></i>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div
                        class="toast-item flex items-center p-4 bg-white border border-red-100 shadow-xl rounded-xl animate-in-right">
                        <div
                            class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-red-500 rounded-full text-[10px]">
                            <i class="fa-solid fa-exclamation text-white"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-[11px] font-bold uppercase tracking-widest text-red-600">Erreur de saisie</p>
                            <p class="text-[9px] text-gray-500">{{ $error }}</p>
                        </div>
                        <button onclick="this.parentElement.remove()" class="ml-auto text-gray-300 hover:text-gray-600">
                            <i class="fa-solid fa-xmark text-xs"></i>
                        </button>
                    </div>
                @endforeach
            @endif
        </div>

        <style>
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }

                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }

            @keyframes fadeOut {
                from {
                    opacity: 1;
                    transform: scale(1);
                }

                to {
                    opacity: 0;
                    transform: scale(0.9);
                }
            }

            .animate-in-right {
                animation: slideInRight 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            }

            .toast-exit {
                animation: fadeOut 0.3s ease forwards;
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const toasts = document.querySelectorAll('.toast-item');

                toasts.forEach((toast) => {
                    setTimeout(() => {
                        toast.classList.add('toast-exit');
                        setTimeout(() => {
                            toast.remove();
                        }, 300);
                    }, 5000);
                });
            });
        </script>
    </body>
</html>
