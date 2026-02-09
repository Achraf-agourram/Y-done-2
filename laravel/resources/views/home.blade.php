<x-app-layout>
    <div class="min-h-screen bg-[#fdfaf6] pb-12">
        
        <div class="relative bg-gradient-to-b from-[#ffedd5] to-[#fdfaf6] pt-16 pb-20 px-4">
            <div class="max-w-7xl mx-auto text-center">
                <h1 class="text-5xl font-black text-orange-600 tracking-tight mb-4">
                    What's cooking today? 🍲
                </h1>
                <p class="text-amber-900 text-lg font-medium mb-8 italic">
                    Discover the best local kitchens at your fingertips.
                </p>

                <div class="max-w-2xl mx-auto relative">
                    <input type="text" 
                           placeholder="Search for a dish, kitchen, or chef..." 
                           style="background-color: white !important; color: #111827 !important;"
                           class="w-full pl-12 pr-4 py-4 rounded-[2rem] border-none shadow-xl focus:ring-2 focus:ring-orange-500 text-lg shadow-orange-100" />
                    <div class="absolute left-5 top-4 text-orange-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                
                @foreach ($restaurants as $r)
                <div class="group bg-white/90 backdrop-blur-sm rounded-[2.5rem] overflow-hidden shadow-xl hover:shadow-2xl transition-all border border-white transform hover:-translate-y-2">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ asset('storage/' . $r->photos->first()->photoContent) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-8">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="text-2xl font-black text-amber-950">{{ $r->restaurentName }}</h3>
                            <span class="text-xs font-bold text-orange-500 bg-orange-50 px-2 py-1 rounded-md uppercase">{{ $r->openingTime }} - {{ $r->closingTime }}</span>
                        </div>
                        <div class="flex items-center justify-between pt-6 border-t border-orange-50">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full bg-orange-200 border-2 border-white shadow-sm overflow-hidden">
                                    <img src="{{ asset('storage/' . $r->owner->photo) }}" class="w-full h-full object-cover">
                                </div>
                                <span class="text-sm font-bold text-amber-900">{{ $r->owner->firstName ." ". $r->owner->familyName }}</span>
                            </div>
                            <a href="/restaurant/menu/{{ $r->id }}" class="bg-orange-600 text-white font-bold px-5 py-2 rounded-xl text-sm shadow-md hover:bg-orange-700 transition-colors">View Menu</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>