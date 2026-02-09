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
                            <a href="/restaurants/{{ $restaurant->id }}/category/{{ $selectedCategory->id }}" class="flex items-center justify-between p-4 bg-orange-600 text-white rounded-2xl shadow-md cursor-pointer">
                                <span class="font-bold">{{ $selectedCategory->categoryTitle }}</span>
                                <span class="text-xs">Edit</span>
                            </a>
                            @foreach ($menu->category as $c)
                                <a href="/restaurants/{{ $restaurant->id }}/category/{{ $c->id }}" class="flex items-center justify-between p-4 bg-white hover:bg-orange-50 text-amber-900 border border-orange-100 rounded-2xl transition-colors cursor-pointer group">
                                    <span class="font-bold">{{ $c->categoryTitle }}</span>
                                    <span class="text-xs opacity-0 group-hover:opacity-100 transition-opacity">Edit</span>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>

                <form action="/addCategory" method="post" class="bg-orange-50 border-2 border-dashed border-orange-200 rounded-[2.5rem] p-6">
                    @csrf
                    <input type="hidden" name="back" value="{{ $restaurant->id }}">
                    @if ($menu)
                        <input type="hidden" name="menu" value="{{ $menu->id }}">
                    @endif
                    <input name="categoryTitle" type="text" placeholder="New category name..." 
                           style="background-color: white !important; color: #111827 !important;"
                           class="w-full border-orange-100 focus:border-orange-500 rounded-xl mb-3" />
                    <button class="w-full bg-amber-900 text-white font-bold py-2 rounded-xl text-sm">Create Category</button>
                </form>
            </div>

            <div class="lg:col-span-8 space-y-6">
                
                <div class="bg-white/80 backdrop-blur-sm border border-white shadow-2xl rounded-[2.5rem] p-8">
                    <h3 class="text-2xl font-black text-amber-950 mb-6 flex items-center">
                        <span class="mr-3">🍲</span> Add a New Dish
                    </h3>
                    
                    <form action="/addDish" method="post" class="space-y-6" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="back" value="{{ $restaurant->id }}">

                        @if ($selectedCategory)
                            <input type="hidden" name="selectedCategory" value="{{ $selectedCategory->id }}">
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label value="Dish Name" class="font-bold text-amber-900" />
                                <input name="dishTitle" type="text" placeholder="e.g. Wagyu Truffle Burger" 
                                       style="background-color: white !important; color: #111827 !important;"
                                       class="w-full mt-1 border-orange-100 focus:border-orange-500 rounded-2xl py-3 shadow-sm" />
                            </div>
                            <div>
                                <x-input-label value="Price ($)" class="font-bold text-amber-900" />
                                <input name="price" type="number" step="0.01" placeholder="19.99" 
                                       style="background-color: white !important; color: #111827 !important;"
                                       class="w-full mt-1 border-orange-100 focus:border-orange-500 rounded-2xl py-3 shadow-sm" />
                            </div>
                        </div>

                        <div class="flex items-center gap-6 p-4 bg-orange-50 rounded-2xl border border-orange-100">
                            <div class="h-20 w-20 bg-white rounded-xl border-2 border-dashed border-orange-200 flex items-center justify-center text-2xl">
                                🖼️
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-amber-900">Dish Photo</p>
                                <input name="dishPhoto" type="file" class="text-xs text-gray-500 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:bg-orange-600 file:text-white" />
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white font-black py-4 rounded-2xl shadow-lg transition-all">
                            Add
                        </button>
                    </form>
                </div>

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
                                <div class="flex gap-2">
                                    <button class="p-2 text-amber-900 hover:bg-orange-50 rounded-lg">✏️</button>
                                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg">🗑️</button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>