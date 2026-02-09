<x-app-layout>
    <div class="min-h-screen py-12 px-4 bg-gradient-to-br from-[#fdfaf6] to-[#ffedd5]">
        
        <div class="max-w-4xl mx-auto mb-8 text-center">
            <h2 class="text-4xl font-black text-orange-600 tracking-tight">Your Profile 🔪</h2>
            <p class="text-amber-900 mt-2 font-medium italic">Manage your personal credentials.</p>
        </div>

        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="md:col-span-1">
                <div class="bg-white/80 backdrop-blur-sm border border-white shadow-xl rounded-[2.5rem] p-8 text-center">
                    <div class="relative inline-block">
                        <img src="{{ asset('storage/' . auth()->user()->photo) }}" 
                             class="w-32 h-32 rounded-full object-cover border-4 border-orange-500 shadow-md mx-auto"
                             alt="Profile Photo">
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-amber-950">{{ auth()->user()->firstName }} {{ auth()->user()->familyName }}</h3>
                    <p class="text-sm text-orange-600 font-semibold uppercase tracking-wider">{{ auth()->user()->role }}</p>
                </div>
            </div>

            <div class="md:col-span-2">
                <div class="bg-white/80 backdrop-blur-sm border border-white shadow-2xl rounded-[2.5rem] p-10">
                    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('patch')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="firstName" :value="__('First Name')" class="text-amber-950 font-bold ml-1" />
                                <input id="fname" name="firstName" type="text" value="{{ auth()->user()->firstName }}" required
                                       style="background-color: white !important; color: #111827 !important;"
                                       class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                                <x-input-error class="mt-2" :messages="$errors->get('fname')" />
                            </div>

                            <div>
                                <x-input-label for="familyName" :value="__('Family Name')" class="text-amber-950 font-bold ml-1" />
                                <input id="sname" name="familyName" type="text" value="{{ auth()->user()->familyName }}" required
                                       style="background-color: white !important; color: #111827 !important;"
                                       class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                                <x-input-error class="mt-2" :messages="$errors->get('sname')" />
                            </div>
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email Address')" class="text-amber-950 font-bold ml-1" />
                            <input name="mail" type="email" value="{{ auth()->user()->email }}" disabled
                                   style="background-color: white !important; color: #111827 !important;"
                                   class="block cursor-not-allowed mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="p-6 bg-orange-50 rounded-3xl border-2 border-dashed border-orange-200">
                            <label for="photo" class="cursor-pointer">
                                <span class="text-orange-800 font-bold block mb-1 text-sm">Update Profile Picture</span>
                                <input type="file" name="photo" id="photo" 
                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-600 file:text-white hover:file:bg-orange-700 cursor:pointer" />
                            </label>
                        </div>

                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit" 
                                    class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 px-8 rounded-2xl shadow-lg shadow-orange-200 transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                                {{ __('Save Changes') }}
                            </button>

                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                   class="text-sm text-green-600 font-bold italic">
                                    {{ __('Freshly saved! ✨') }}
                                </p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>