<x-app-layout>
    <div class="min-h-screen bg-[#fdfaf6] pb-12">
        
        <div class="bg-white border-b border-orange-100 pt-12 pb-12 px-4 shadow-sm">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                <div>
                    <h1 class="text-4xl font-black text-amber-950 tracking-tight">My Kitchens 🏠</h1>
                    <p class="text-orange-600 font-medium italic mt-1">Manage your culinary empire and menus.</p>
                </div>
                
                <a href="/my-restaurants/new" 
                   class="inline-flex items-center justify-center bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 px-6 rounded-2xl shadow-lg shadow-orange-200 transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                    <span class="text-xl mr-2">+</span> Add New Restaurant
                </a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">

            <div class="space-y-6">
                @foreach ($restaurants as $restaurant)
                    <div class="bg-white/80 backdrop-blur-sm border border-white shadow-xl rounded-[2.5rem] p-6 flex flex-col md:flex-row items-center gap-6">
                        <div class="w-full md:w-48 h-32 rounded-[1.5rem] overflow-hidden shadow-inner">
                            <a href="/restaurants/{{ $restaurant->id }}"><img src="{{ asset('storage/' . $restaurant->photos->first()->photoContent) }}" class="w-full h-full object-cover"></a>
                        </div>
                        
                        <div class="flex-1 text-center md:text-left">
                            <div class="flex flex-col md:flex-row md:items-center md:gap-3">
                                <h3 class="text-2xl font-black text-amber-950">{{ $restaurant->restaurentName }}</h3>
                                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full uppercase self-center md:self-auto mt-2 md:mt-0">Open</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">{{ $restaurant->location }}</p>
                        </div>

                        <div class="flex items-center gap-3 w-full md:w-auto justify-center">
                            <a href="/restaurants/{{ $restaurant->id }}/edit" 
                            class="flex-1 md:flex-none text-center bg-amber-100 hover:bg-amber-200 text-amber-900 font-bold py-3 px-6 rounded-xl transition-colors">
                                Edit Info
                            </a>
                            <button class="flex-1 md:flex-none text-center bg-red-50 hover:bg-red-100 text-red-600 font-bold py-3 px-6 rounded-xl transition-colors">
                                Delete
                            </button>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>