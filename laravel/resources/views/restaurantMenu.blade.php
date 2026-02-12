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

        @if ($todayOpeningTimes)
            <div class="max-w-6xl mx-auto mt-16 px-4">
                <div class="bg-white/80 backdrop-blur-sm border border-white shadow-2xl rounded-[2.5rem] overflow-hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-2">
                        
                        <div class="p-8 md:p-12 border-b lg:border-b-0 lg:border-r border-orange-100">
                            <h3 class="text-3xl font-black text-amber-950 mb-2">Book a Table 🍷</h3>
                            <p class="text-orange-600 font-medium mb-8 italic">Secure your spot for a delightful meal.</p>

                            <div class="space-y-6">
                                <input type="hidden" id="hourToBook" name="hourToBook">
                                <div>
                                    <x-input-label value="Available Times (Today)" class="font-bold text-amber-900 ml-1 mb-3" />
                                    <div class="grid grid-cols-3 gap-3">
                                        @foreach($availableHoursToBook as $hour)
                                            <button type="button" class="py-3 rounded-xl border border-orange-100 font-bold text-sm transition-all hover:bg-orange-500 hover:text-white focus:bg-orange-600 focus:text-white active:scale-95 shadow-sm" onclick="setHour('{{ $hour }}')">
                                                {{ $hour }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>

                                <div>
                                    <x-input-label value="Number of tables" class="font-bold text-amber-900 ml-1 mb-2" />
                                    <input type="number" id="table-input" value="1" min="1" style="background-color: white !important; color: #111827 !important;"
                                            class="w-full border-orange-100 focus:border-orange-500 rounded-2xl py-3 shadow-sm appearance-none">
                                    </input>
                                </div>
                            </div>
                        </div>

                        <div class="p-8 md:p-12 bg-orange-50/50">
                            <h3 class="text-2xl font-black text-amber-950 mb-6">Reservation Summary</h3>
                            
                            <div class="space-y-4 mb-8">
                                <div class="flex justify-between text-amber-900 font-medium">
                                    <span>Reservation Fee</span>
                                    <span>$<span id="summary-fee">20.00</span></span>
                                </div>
                                <div class="flex justify-between text-amber-900 font-medium">
                                    <span>Tables amount</span>
                                    <span id="summary-amount">2</span>
                                </div>
                                <div class="border-t border-orange-200 pt-4 flex justify-between text-xl font-black text-amber-950">
                                    <span>Total Deposit</span>
                                    <span class="text-orange-600">$<span id="summary-total">20.00</span></span>
                                </div>
                            </div>

                            <form action="/book" method="post" class="space-y-4">
                                @csrf
                                <p class="text-xs text-center text-gray-500 font-bold uppercase tracking-widest mb-2">Secure Checkout via</p>
                                
                                <button class="w-full bg-[#ffc439] hover:bg-[#f2ba36] transition-colors py-4 rounded-2xl shadow-md flex items-center justify-center">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="h-6">
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @else
            <div class="max-w-6xl mx-auto mb-8">
                <div class="bg-amber-50 border border-orange-200 rounded-[2rem] p-6 flex items-center shadow-sm">
                    <div class="bg-white p-3 rounded-full shadow-inner mr-5">
                        <span class="text-2xl">😴</span>
                    </div>
                    <div>
                        <h4 class="text-xl font-black text-amber-950">This restaurant is closed today</h4>
                        <p class="text-orange-800/80 font-medium italic text-sm">
                            The chef is resting! Check back tomorrow.
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tableInput = document.getElementById('table-input');
            const summaryFee = document.getElementById('summary-fee');
            const summaryAmount = document.getElementById('summary-amount');
            const summaryTotal = document.getElementById('summary-total');

            const baseFeePerTable = 20.00;

            function updateSummary() {
                let count = parseInt(tableInput.value);
                if (isNaN(count) || count < 1) count = 1;

                const totalFee = (count * baseFeePerTable).toFixed(2);

                summaryAmount.innerText = count;
                summaryTotal.innerText = totalFee;
        
            }

            tableInput.addEventListener('input', updateSummary);
        });

        function setHour(hour) {
            document.getElementById('hourToBook').value = hour;
        }
    </script>
</x-app-layout>