<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-4 bg-gradient-to-br from-[#fdfaf6] to-[#ffedd5]">
        
        <div class="mb-4 text-center">
            <div class="inline-block p-3 bg-white rounded-full shadow-sm mb-4">
                <span class="text-4xl">🧑‍🍳</span>
            </div>
            <h2 class="text-4xl font-black text-orange-600 tracking-tight">Y-done Kitchen</h2>
            <p class="text-amber-900 mt-1 font-medium italic">The hunger killer</p>
        </div>

        <div class="w-full sm:max-w-md bg-white/80 backdrop-blur-sm border border-white shadow-[0_20px_50px_rgba(234,88,12,0.1)] rounded-[2.5rem] p-10">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="space-y-5">
                    <div>
                        <x-input-label for="fname" :value="__('First Name')" class="text-amber-950 font-bold ml-1" />
                        <input id="fname" 
                               type="text" name="fname" :value="old('fname')" required autofocus 
                               placeholder="e.g. Gordon"
                               style="background-color: white !important; color: #111827 !important;"
                               class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                        <x-input-error :messages="$errors->get('fname')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="sname" :value="__('Family Name')" class="text-amber-950 font-bold ml-1" />
                        <input id="sname" 
                               type="text" name="sname" :value="old('sname')" required 
                               placeholder="e.g. Ramsay"
                               style="background-color: white !important; color: #111827 !important;"
                               class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                        <x-input-error :messages="$errors->get('sname')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-amber-950 font-bold ml-1" />
                        <input id="email" 
                               type="email" name="email" :value="old('email')" required 
                               placeholder="chef@restaurant.com"
                               style="background-color: white !important; color: #111827 !important;"
                               class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="role" :value="__('Join as...')" class="text-amber-950 font-bold ml-1" />
                        <select id="role" name="role" required
                                style="background-color: white !important; color: #111827 !important;"
                                class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3 appearance-none">
                            <option value="" disabled selected>Select your role</option>
                            <option value="client">Client (I want to eat! 😋)</option>
                            <option value="owner">Owner (I want to cook! 👨‍🍳)</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-1" />
                    </div>

                    <div class="p-5 bg-gradient-to-r from-orange-50 to-amber-50 rounded-3xl border-2 border-dashed border-orange-200 group hover:border-orange-400 transition-colors">
                        <label for="photo" class="cursor-pointer block">
                            <span class="text-orange-800 font-bold block mb-1">Chef Profile Picture</span>
                            <span class="text-xs text-orange-600/70 block mb-3">JPG, PNG up to 2MB</span>
                            <input type="file" name="photo" id="photo" 
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-600 file:text-white hover:file:bg-orange-700 cursor-pointer" />
                        </label>
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-amber-950 font-bold ml-1" />
                        <input id="password" 
                               type="password" name="password" required 
                               style="background-color: white !important; color: #111827 !important;"
                               class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-amber-950 font-bold ml-1" />
                        <input id="password_confirmation" 
                               type="password" name="password_confirmation" required 
                               style="background-color: white !important; color: #111827 !important;"
                               class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                    </div>
                </div>

                <div class="mt-10 flex flex-col items-center space-y-4">
                    <button type="submit" 
                            class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 rounded-2xl text-lg shadow-lg shadow-orange-200 transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                        {{ __('Get Cooking!') }}
                    </button>

                    <a class="text-sm font-medium text-amber-900 hover:text-orange-600 transition-colors underline decoration-orange-200 underline-offset-4" href="{{ route('login') }}">
                        {{ __('Already have an account? Sign in') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>