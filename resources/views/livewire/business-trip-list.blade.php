<div>
    <div style="background-image: url('/assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section class="bg-gray-50 min-h-screen">
        <div class="w-10/12 mx-auto py-24">
            <h2 class="text-center text-3xl font-bebas mb-8">Іссапарлар</h2>

            <!-- Поиск -->
            <div class="mb-8">
                <div class="max-w-md mx-auto">
                    <input
                        type="text"
                        wire:model.live="search"
                        placeholder="Іссапарларды іздеу..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>
            </div>

            <!-- Результаты поиска -->
            @if($search)
                <div class="mb-4 text-center text-gray-600">
                    Табылды: {{ $businessTrips->total() }} іссапар "{{ $search }}" сұрауы бойынша
                </div>
            @endif

            <!-- Список командировок -->
            @if($businessTrips->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @foreach($businessTrips as $trip)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            @if($trip->cover_image)
                                <div class="h-48 bg-gray-200 overflow-hidden">
                                    <img
                                        src="{{ asset('storage/' . $trip->cover_image) }}"
                                        alt="{{ $trip->name }}"
                                        class="w-full h-full object-cover"
                                    >
                                </div>
                            @else
                                <div class="h-48 bg-gray-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v2a2 2 0 01-2 2H10a2 2 0 01-2-2V6"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $trip->name }}</h3>
                                <p class="text-gray-600 mb-3 overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                    {{ Str::limit($trip->description, 150) }}
                                </p>

                                <div class="space-y-2 mb-4">
                                    <!-- Галерея -->
                                    @if($trip->galleryItems->count() > 0)
                                        <div class="flex items-center text-sm text-gray-500">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>{{ $trip->galleryItems->count() }} сурет</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex justify-between items-center">

                                    <a
                                        href="{{ route('business-trip.view', $trip->id) }}"
                                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200"
                                    >
                                        Толығырақ
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Пагинация -->
                <div class="flex justify-center">
                    {{ $businessTrips->links() }}
                </div>
            @else
                <div class="text-center py-16">

                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Іссапарлар табылмады</h3>
                    @if($search)
                        <p class="text-gray-500">Іздеу критерийлерін өзгертіп көріңіз</p>
                    @else
                        <p class="text-gray-500">Әзірше іссапарлар жоқ</p>
                    @endif
                </div>
            @endif
        </div>
    </section>

    @include('layouts.footer')
</div>
