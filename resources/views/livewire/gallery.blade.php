<div>
    <div style="background-image: url('/assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            @include('layouts.header')
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section class="bg-gray-50 min-h-screen">
        <div class="w-10/12 mx-auto py-24">
            <h2 class="text-center text-3xl font-bebas mb-8">Фото галерея</h2>

            <!-- Фильтры и поиск -->
            <div class="mb-8">
                <div class="max-w-4xl mx-auto">
                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Поиск -->
                        <div class="flex-1">
                            <input
                                type="text"
                                wire:model.live="search"
                                placeholder="Суреттерді іздеу..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            >
                        </div>
                        <!-- Категория -->
                        <div class="w-full md:w-48">
                            <select
                                wire:model.live="category"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            >
                                <option value="">Барлық санаттар</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}">{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Рекомендуемые -->
                        <div class="flex items-center">
                            <label class="flex items-center space-x-2">
                                <input
                                    type="checkbox"
                                    wire:model.live="featuredOnly"
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                >
                                <span class="text-gray-700">Ұсынылған</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Результаты поиска -->
            @if($search || $category || $featuredOnly)
                <div class="mb-4 text-center text-gray-600">
                    Табылды: {{ $items->total() }} сурет
                    @if($search) "{{ $search }}" сұрауы бойынша @endif
                    @if($category) "{{ $category }}" санатында @endif
                    @if($featuredOnly) (ұсынылған) @endif
                </div>
            @endif

            <!-- Галерея -->
            @if($items->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                    @foreach($items as $item)
                        <div class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-all duration-300 bg-white">
                            <!-- Изображение -->
                            <div class="aspect-square overflow-hidden">
                                <img
                                    src="{{ asset('storage/' . $item->image_path) }}"
                                    alt="{{ $item->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    loading="lazy"
                                >
                            </div>

                            <!-- Overlay с информацией -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                                <h3 class="text-white font-semibold text-lg mb-1">{{ $item->title }}</h3>
                                @if($item->description)
                                    <p class="text-white/90 text-sm mb-2">{{ Str::limit($item->description, 80) }}</p>
                                @endif

                                <div class="flex items-center justify-between">
                                    @if($item->category)
                                        <span class="text-xs bg-white/20 text-white px-2 py-1 rounded-full backdrop-blur-sm">
                                            {{ $item->category }}
                                        </span>
                                    @endif

                                    @if($item->businessTrip)
                                        <a
                                            href="{{ route('business-trip.view', $item->businessTrip->id) }}"
                                            class="text-xs bg-blue-500/80 text-white px-2 py-1 rounded-full hover:bg-blue-600/80 transition-colors"
                                        >
                                            {{ Str::limit($item->businessTrip->name, 20) }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <!-- Значок рекомендуемого -->
                            @if($item->is_featured)
                                <div class="absolute top-3 right-3">
                                    <div class="bg-yellow-500 text-white p-2 rounded-full shadow-lg">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    </div>
                                </div>
                            @endif

                            <!-- Информационная панель внизу -->
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-800 mb-1">{{ $item->title }}</h3>
                                @if($item->description)
                                    <p class="text-gray-600 text-sm mb-2 line-clamp-2">{{ $item->description }}</p>
                                @endif

                                <div class="flex items-center justify-between text-xs text-gray-500">
                                    <span>{{ $item->created_at->format('d.m.Y') }}</span>
                                    @if($item->category)
                                        <span class="bg-gray-100 px-2 py-1 rounded-full">{{ $item->category }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Пагинация -->
                <div class="flex justify-center">
                    {{ $items->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <div class="mb-4">
                        <svg class="w-16 h-16 text-gray-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Суреттер табылмады</h3>
                    @if($search || $category || $featuredOnly)
                        <p class="text-gray-500 mb-4">Іздеу критерийлерін өзгертіп көріңіз</p>
                        <button
                            wire:click="$set('search', '')"
                            wire:click="$set('category', '')"
                            wire:click="$set('featuredOnly', false)"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors"
                        >
                            Барлық суреттерді көрсету
                        </button>
                    @else
                        <p class="text-gray-500">Галереяда әзірше суреттер жоқ</p>
                    @endif
                </div>
            @endif

            <!-- Статистика внизу -->
            @if($items->total() > 0)
                <div class="mt-12 bg-white rounded-lg shadow-md p-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                        <div>
                            <div class="text-2xl font-bold text-blue-600">{{ $items->total() }}</div>
                            <div class="text-gray-600">Барлық суреттер</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-green-600">{{ $categories->count() }}</div>
                            <div class="text-gray-600">Санаттар</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-purple-600">
                                {{ \App\Models\GalleryItem::where('is_featured', true)->count() }}
                            </div>
                            <div class="text-gray-600">Ұсынылған</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-orange-600">
                                {{ \App\Models\GalleryItem::whereNotNull('event_id')->count() }}
                            </div>
                            <div class="text-gray-600">Іссапарлар</div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    @include('layouts.footer')
</div>
