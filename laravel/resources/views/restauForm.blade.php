<x-app-layout>
    <div class="min-h-screen bg-[#fdfaf6] py-12 px-4">
        
        <div class="max-w-3xl mx-auto mb-10 text-center">
            <h1 class="text-4xl font-black text-orange-600 tracking-tight">Open a New Kitchen 🍳</h1>
            <p class="text-amber-900 mt-2 font-medium">Fill in the ingredients below to start your culinary journey.</p>
        </div>

        <div class="max-w-3xl mx-auto bg-white/80 backdrop-blur-sm border border-white shadow-2xl rounded-[2.5rem] p-8 md:p-12">
            <form action="/my-restaurants/new" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="space-y-8">
                    
                    <div class="space-y-4">
                        <h3 class="text-lg font-black text-amber-950 border-b border-orange-100 pb-2">The Basics</h3>
                        
                        <div>
                            <x-input-label for="name" :value="__('Restaurant Name')" class="text-amber-950 font-bold ml-1" />
                            <input id="name" name="restaurentName" type="text" placeholder="e.g. The Sizzling Skillet" required
                                   style="background-color: white !important; color: #111827 !important;"
                                   class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                        </div>

                        <div>
                            <x-input-label for="location" :value="__('Location / Address')" class="text-amber-950 font-bold ml-1" />
                            <input id="location" name="location" type="text" placeholder="e.g. 123 Gourmet Ave, Food City" required
                                   style="background-color: white !important; color: #111827 !important;"
                                   class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            <x-input-label for="capacity" :value="__('Capacity (Seats)')" class="text-amber-950 font-bold ml-1" />
                            <input id="capacity" name="capacity" type="number" placeholder="25" required
                                   style="background-color: white !important; color: #111827 !important;"
                                   class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                        </div>

                        <div class="md:col-span-1">
                            <x-input-label for="opening_time" :value="__('Opening Time')" class="text-amber-950 font-bold ml-1" />
                            <input id="opening_time" name="openingTime" type="time" required
                                   style="background-color: white !important; color: #111827 !important;"
                                   class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                        </div>

                        <div class="md:col-span-1">
                            <x-input-label for="closing_time" :value="__('Closing Time')" class="text-amber-950 font-bold ml-1" />
                            <input id="closing_time" name="closingTime" type="time" required
                                   style="background-color: white !important; color: #111827 !important;"
                                   class="block mt-1 w-full border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl shadow-sm px-4 py-3" />
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-lg font-black text-amber-950 border-b border-orange-100 pb-2">Appearance</h3>
                        
                        <div class="p-8 bg-gradient-to-r from-orange-50 to-amber-50 rounded-[2rem] border-2 border-dashed border-orange-200 text-center hover:border-orange-400 transition-colors">
                            <label for="photos" class="cursor-pointer">
                                <span class="text-3xl block mb-2">📸</span>
                                <span class="text-orange-800 font-black block mb-1">Upload Restaurant Photos</span>
                                <span class="text-xs text-orange-600/70 block mb-4">Show off your storefront or signature dishes (Max 5 photos)</span>
                                <input type="file" name="photos[]" multiple
                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-6 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-orange-600 file:text-white hover:file:bg-orange-700 cursor:pointer" />
                            </label>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-4 pt-6">
                        <button type="submit" 
                                class="w-full sm:w-auto bg-orange-600 hover:bg-orange-700 text-white font-black py-4 px-10 rounded-2xl text-lg shadow-lg shadow-orange-200 transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                            Launch Kitchen 🚀
                        </button>
                        
                        <a href="/my-restaurants" 
                           class="w-full sm:w-auto text-center text-amber-900 font-bold hover:text-orange-600 transition-colors">
                            Cancel and Go Back
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>