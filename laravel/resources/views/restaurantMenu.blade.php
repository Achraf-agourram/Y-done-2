<x-app-layout>
    <div class="min-h-screen bg-[#fdfaf6] py-12 px-4">
        
        <div class="max-w-6xl mx-auto mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <nav class="flex text-sm text-orange-600 font-bold mb-2 uppercase tracking-widest">
                    <a href="/my-restaurants" class="hover:underline">My Kitchens</a>
                    <span class="mx-2">/</span>
                    <span class="text-amber-900">{{ $restaurant->restaurentName }}</span>
                </nav>
                <h1 class="text-4xl font-black text-amber-950 tracking-tight">Design Your Menu 📝</h1>
            </div>
        </div>

        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white/80 backdrop-blur-sm border border-white shadow-xl rounded-[2.5rem] p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-black text-amber-950">Categories</h3>
                    </div>

                    @if($selectedCategory)
                        <div class="space-y-3">
                            <a href="/restaurant/menu/{{ $restaurant->id }}/category/{{ $selectedCategory->id }}" class="flex items-center justify-between p-4 bg-orange-600 text-white rounded-2xl shadow-md cursor-pointer">
                                <span class="font-bold">{{ $selectedCategory->categoryTitle }}</span>
                            </a>
                            @foreach ($menu->category as $c)
                                <a href="/restaurant/menu/{{ $restaurant->id }}/category/{{ $c->id }}" class="flex items-center justify-between p-4 bg-white hover:bg-orange-50 text-amber-900 border border-orange-100 rounded-2xl transition-colors cursor-pointer group">
                                    <span class="font-bold">{{ $c->categoryTitle }}</span>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="lg:col-span-8 space-y-6">

                <div class="space-y-4">
                    <h4 class="text-lg font-black text-amber-950 ml-2">Currently in this Category</h4>
                    
                    @if($selectedCategory)
                        @foreach ($selectedCategory->dishes as $dish)
                            <div class="bg-white border border-orange-50 rounded-3xl p-4 flex items-center justify-between shadow-sm">
                                <div class="flex items-center gap-4">
                                    <div class="w-16 h-16 rounded-2xl bg-gray-200 overflow-hidden">
                                        <img src="{{ asset('storage/' . $dish->dishPhoto) }}" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h5 class="font-bold text-amber-950">{{ $dish->dishTitle }}</h5>
                                        <p class="text-orange-600 font-black text-sm">{{ $dish->price }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>