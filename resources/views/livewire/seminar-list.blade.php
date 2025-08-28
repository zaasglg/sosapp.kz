<div >
    <div style="background-image: url('/assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Халықаралық семинарлар</h1>

            <!-- Filters -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
                            Атауы немесе сипаттамасы бойынша іздеу
                        </label>
                        <input
                            wire:model.live.debounce.300ms="search"
                            type="text"
                            id="search"
                            placeholder="Іздеу сөзін енгізіңіз..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                            Санат
                        </label>
                        <select
                            wire:model.live="category"
                            id="category"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                            <option value="">Барлық санаттар</option>
                            <option value="general">Жалпы</option>
                            <option value="presentation">Презентациялар</option>
                            <option value="discussion">Талқылаулар</option>
                            <option value="workshop">Шеберханалар</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Seminars Grid -->
        @if($seminars->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                @foreach($seminars as $seminar)
                    <a href="{{ route('seminar.view', $seminar->id) }}" wire:navigate class="block">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 cursor-pointer">
                            <div class="relative h-48 bg-gray-200">
                                @if($seminar->cover_image)
                                    <img
                                        src="{{ Storage::url($seminar->cover_image) }}"
                                        alt="{{ $seminar->name }}"
                                        class="w-full h-full object-cover"
                                    >
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-400 to-blue-600">
                                        <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                @endif

                                @if($seminar->gallery_items_count > 0)
                                    <div class="absolute top-2 right-2 bg-black bg-opacity-75 text-white px-2 py-1 rounded text-sm">
                                        {{ $seminar->gallery_items_count }} сурет
                                    </div>
                                @endif
                            </div>

                            <div class="p-4">
                                <h3 class="font-semibold text-lg text-gray-800 mb-2">{{ $seminar->name }}</h3>
                                <p class="text-gray-600 text-sm mb-3 line-clamp-3">{{ Str::limit($seminar->description, 100) }}</p>

                                <div class="flex items-center justify-between">
                                    <span class="bg-blue-600 text-white px-3 py-1 rounded text-sm transition-colors duration-200">
                                        Толығырақ
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $seminars->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Семинарлар табылмады</h3>
                <p class="mt-1 text-sm text-gray-500">
                    @if($search || $category)
                        Іздеу параметрлерін өзгертіп көріңіз.
                    @else
                        Семинарлар әлі қосылмаған.
                    @endif
                </p>

                @if($search || $category)
                    <button
                        wire:click="$set('search', ''); $set('category', '')"
                        class="mt-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        Фильтрлерді тазалау
                    </button>
                @endif
            </div>
        @endif

        <!-- Loading indicator -->
        <div wire:loading class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 flex items-center space-x-3">
                <svg class="animate-spin h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="text-gray-700">Жүктелуде...</span>
            </div>
        </div>
    </div>
</div>
