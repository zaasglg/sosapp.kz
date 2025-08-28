<div>
    <!-- Hero Section with Header -->
    <div style="background-image: url('/assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <!-- Modern Library Section -->
    <section class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Modern Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent mb-4">
                    Кітапхана
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Заманауи цифрлық кітапхана
                </p>
            </div>

            <!-- Modern Search -->
            <div class="max-w-2xl mx-auto mb-12">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input
                        type="text"
                        wire:model.live="search"
                        placeholder="Кітап іздеу..."
                        class="w-full pl-12 pr-4 py-4 bg-white/70 backdrop-blur-sm border-2 border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 hover:border-gray-300 transition-all duration-300 text-lg placeholder-gray-400"
                    >
                </div>
            </div>

            <!-- Search Results Badge -->
            @if($search)
                <div class="flex justify-center mb-8">
                    <div class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $books->total() }} кітап табылды
                    </div>
                </div>
            @endif

            <!-- Modern Books Grid -->
            @if($books->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-6 mb-12">
                    @foreach($books as $book)
                        <div class="group relative bg-white/60 backdrop-blur-sm rounded-3xl p-6 hover:bg-white/80 transition-all duration-500 hover:scale-[1.02] border-2 border-gray-200 hover:border-blue-300">
                            <!-- Book Cover with Modern Frame -->
                            <div class="relative mb-6">
                                <div class="aspect-[3/4] rounded-2xl overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 border-2 border-gray-200">
                                    @if($book->cover_image)
                                        <img
                                            src="{{ asset('storage/' . $book->cover_image) }}"
                                            alt="{{ $book->name }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                            loading="lazy"
                                        >
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <div class="w-16 h-16 rounded-2xl bg-blue-600 flex items-center justify-center border-2 border-blue-300">
                                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Modern Content -->
                            <div class="space-y-4">
                                <h3 class="font-semibold text-gray-900 leading-tight line-clamp-2 group-hover:text-blue-600 transition-colors duration-300">
                                    {{ $book->name }}
                                </h3>

                                <!-- Simple CTA Button -->
                                <a
                                    href="{{ route('book.view', $book->id) }}"
                                    class="flex items-center justify-center w-full py-3 px-4 bg-blue-600 text-white font-medium rounded-2xl hover:bg-blue-700 transition-all duration-300 transform hover:scale-105"
                                >
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    Оқу
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Modern Pagination -->
                <div class="flex justify-center">
                    <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-4 border-2 border-gray-200">
                        {{ $books->links() }}
                    </div>
                </div>
            @else
                <!-- Modern Empty State -->
                <div class="text-center py-20">
                    <div class="relative mb-8">
                        <!-- Animated Background -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-32 h-32 bg-gradient-to-r from-blue-100 to-purple-100 rounded-full opacity-50 animate-pulse"></div>
                        </div>
                        <!-- Icon -->
                        <div class="relative flex items-center justify-center">
                            <div class="w-20 h-20 bg-blue-600 rounded-3xl flex items-center justify-center border-4 border-blue-300">
                                @if($search)
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                @else
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                @endif
                            </div>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-900 mb-4">
                        @if($search)
                            Іздеу нәтижелері табылмады
                        @else
                            Кітаптар әлі жоқ
                        @endif
                    </h3>

                    <p class="text-gray-600 mb-8 max-w-md mx-auto">
                        @if($search)
                            "{{ $search }}" сұрауы бойынша ешқандай кітап табылмады. Басқа кілт сөздерді қолданып көріңіз.
                        @else
                            Кітапхана толтырылуда. Жақын арада жаңа кітаптар қосылады.
                        @endif
                    </p>

                    @if($search)
                        <button
                            wire:click="$set('search', '')"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-2xl hover:bg-blue-700 transition-all duration-300 transform hover:scale-105"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Іздеуді тазалау
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </section>

    @include('layouts.footer')
</div>
