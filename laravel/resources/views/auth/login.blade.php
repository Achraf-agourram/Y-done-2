<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-4 bg-gradient-to-br from-[#fdfaf6] to-[#ffedd5]">
        
        <div class="mb-8 text-center">
            <div class="inline-block p-3 bg-white rounded-full shadow-sm mb-4">
                <span class="text-4xl">🍳</span>
            </div>
            <h2 class="text-4xl font-black text-orange-600 tracking-tight">Welcome Back!</h2>
            <p class="text-amber-900 mt-1 font-medium italic">Ready to get back ?</p>
        </div>

        <div class="w-full sm:max-w-md bg-white/80 backdrop-blur-sm border border-white shadow-[0_20px_50px_rgba(234,88,12,0.1)] rounded-[2.5rem] p-10">
            
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="space-y-6">
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-amber-950 font-bold ml-1" />
                        <input id="email" 
                               type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                               placeholder="chef@restaurant.com"
                               style="background-color: white !important; color: #111827 !important;"
                               class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div>
                        <div class="flex justify-between items-center ml-1">
                            <x-input-label for="password" :value="__('Password')" class="text-amber-950 font-bold" />
                        </div>
                        <input id="password" 
                               type="password" name="password" required autocomplete="current-password" 
                               style="background-color: white !important; color: #111827 !important;"
                               class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>
                </div>

                <div class="mt-10 flex flex-col items-center space-y-4">
                    <button type="submit" 
                            class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 rounded-2xl text-lg shadow-lg shadow-orange-200 transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                        {{ __('Log In') }}
                    </button>

                    <p class="text-sm text-amber-900">
                        {{ __("New to the kitchen?") }}
                        <a class="font-bold text-orange-600 hover:text-orange-700 transition-colors underline decoration-orange-200 underline-offset-4" href="{{ route('register') }}">
                            {{ __('Join us here') }}
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>