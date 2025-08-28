@if($seminar)
<div>
    <!-- Hero Section with Header -->
    <div style="background-image: url('/assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <!-- Main Content Section -->
    <section class="bg-gradient-to-br from-slate-50 via-white to-slate-100 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Back Button -->
            <div class="mb-8">
                <a href="{{ route('seminars.list') }}" 
                   class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-all duration-300">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Артқа қайту
                </a>
            </div>

            <!-- Seminar Header -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 border border-gray-200 mb-8">
                <!-- Title -->
                <h1 class="text-4xl font-bold text-gray-900 mb-6 leading-tight">
                    {{ $seminar->name }}
                </h1>

                <!-- Cover Image -->
                @if($seminar->cover_image)
                    <div class="mb-8">
                        <img
                            src="{{ Storage::url($seminar->cover_image) }}"
                            alt="{{ $seminar->name }}"
                            class="w-full h-64 md:h-96 object-cover rounded-2xl border border-gray-200 cursor-pointer hover:opacity-90 transition-opacity duration-300"
                            wire:click="openImageModal(-1)"
                            data-cover-image="true"
                        >
                    </div>
                @endif

                <!-- Description -->
                <div class="prose prose-lg max-w-none mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Сипаттамасы</h2>
                    <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                        {{ $seminar->description }}
                    </div>
                </div>

                <!-- Categories -->
                @if($seminar->galleryItems->count() > 0)
                    @php
                        $categories = $seminar->galleryItems->pluck('category')->unique()->filter();
                        $categoryLabels = [
                            'general' => 'Жалпы',
                            'presentation' => 'Презентациялар',
                            'discussion' => 'Талқылаулар',
                            'workshop' => 'Шеберхана'
                        ];
                    @endphp
                    @if($categories->count() > 0)
                        <div class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Санаттар</h2>
                            <div class="flex flex-wrap gap-3">
                                @foreach($categories as $category)
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        {{ $categoryLabels[$category] ?? ucfirst($category) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endif

                <!-- Gallery -->
                @if($seminar->galleryItems->count() > 0)
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Галерея ({{ $seminar->galleryItems->count() }} элемент)
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach($seminar->galleryItems as $index => $item)
                                <div class="relative group cursor-pointer"
                                     wire:click="openImageModal({{ $index }})"
                                     data-gallery-index="{{ $index }}">
                                    <img
                                        src="{{ Storage::url($item->image_path) }}"
                                        alt="{{ $item->title }}"
                                        class="w-full h-48 object-cover rounded-xl border border-gray-200 transition-transform duration-300 group-hover:scale-105"
                                    >
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 rounded-xl flex items-center justify-center">
                                        <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                        </svg>
                                    </div>
                                    @if($item->is_featured)
                                        <div class="absolute top-2 right-2 bg-yellow-500 text-white rounded-full p-2">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    @if($item->title)
                                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-70 text-white p-2 rounded-b-xl">
                                            <p class="text-sm font-medium truncate">{{ $item->title }}</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="bg-gray-50 rounded-2xl p-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Галерея бос</h3>
                        <p class="text-gray-500">Бұл семинар үшін суреттер әлі қосылмаған.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @include('layouts.footer')

    <!-- Image Modal -->
    @if($showImageModal && $seminar && ($seminar->galleryItems->count() > 0 || $seminar->cover_image))
        <div class="fixed inset-0 bg-black bg-opacity-90 z-[9999] flex items-center justify-center p-4" style="z-index: 9999;">
            <div class="relative w-full h-full flex items-center justify-center">
                <!-- Close button -->
                <button 
                    wire:click="closeImageModal"
                    class="absolute top-4 right-4 text-white text-4xl font-bold hover:text-gray-300 z-20 bg-black bg-opacity-50 rounded-full w-12 h-12 flex items-center justify-center transition-colors duration-200">
                    ×
                </button>

                <!-- Previous button -->
                @php
                    $totalImages = $seminar->galleryItems->count();
                    $hasCover = $seminar->cover_image ? 1 : 0;
                    $showNavigation = ($totalImages + $hasCover) > 1;
                @endphp
                
                @if($showNavigation)
                    <button 
                        wire:click="previousImage"
                        class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white hover:text-gray-300 z-20 bg-black bg-opacity-50 rounded-full w-12 h-12 flex items-center justify-center transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                @endif

                <!-- Next button -->
                @if($showNavigation)
                    <button 
                        wire:click="nextImage"
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white hover:text-gray-300 z-20 bg-black bg-opacity-50 rounded-full w-12 h-12 flex items-center justify-center transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                @endif

                <!-- Current image -->
                @if($currentImageIndex === -1 && $seminar->cover_image)
                    <!-- Show cover image -->
                    <div class="flex flex-col items-center justify-center max-w-full max-h-full">
                        <img
                            src="{{ Storage::url($seminar->cover_image) }}"
                            alt="{{ $seminar->name }}"
                            class="max-w-full max-h-[85vh] object-contain rounded-lg"
                        >

                        <!-- Image info -->
                        <div class="mt-4 text-center text-white bg-black bg-opacity-70 rounded-lg p-4 max-w-lg">
                            <h3 class="text-lg font-semibold mb-2">{{ $seminar->name }}</h3>
                            <p class="text-sm text-gray-300">Негізгі сурет</p>
                            <p class="text-xs text-gray-400 mt-2">
                                Негізгі сурет / {{ $seminar->galleryItems->count() }} галерея суреті
                            </p>
                        </div>
                    </div>
                @elseif($currentImageIndex >= 0 && $seminar->galleryItems->count() > 0)
                    <!-- Show gallery image -->
                    @php
                        $currentItem = $seminar->galleryItems[$currentImageIndex] ?? null;
                    @endphp
                    @if($currentItem)
                        <div class="flex flex-col items-center justify-center max-w-full max-h-full">
                            <img
                                src="{{ Storage::url($currentItem->image_path) }}"
                                alt="{{ $currentItem->title }}"
                                class="max-w-full max-h-[85vh] object-contain rounded-lg"
                            >

                            <!-- Image info -->
                            @if($currentItem->title || $currentItem->description)
                                <div class="mt-4 text-center text-white bg-black bg-opacity-70 rounded-lg p-4 max-w-lg">
                                    @if($currentItem->title)
                                        <h3 class="text-lg font-semibold mb-2">{{ $currentItem->title }}</h3>
                                    @endif
                                    @if($currentItem->description)
                                        <p class="text-sm text-gray-300">{{ $currentItem->description }}</p>
                                    @endif
                                    <p class="text-xs text-gray-400 mt-2">
                                        {{ $currentImageIndex + 1 }} / {{ $seminar->galleryItems->count() }} (галерея)
                                    </p>
                                </div>
                            @else
                                <div class="mt-4 text-center text-white bg-black bg-opacity-70 rounded-lg p-2">
                                    <p class="text-sm text-gray-400">
                                        {{ $currentImageIndex + 1 }} / {{ $seminar->galleryItems->count() }} (галерея)
                                    </p>
                                </div>
                            @endif
                        </div>
                    @endif
                @endif
            </div>
        </div>
    @endif

    <script>
        // Debug logging
        console.log('SeminarViewer script loaded');
        console.log('showImageModal state:', @json($showImageModal));

        document.addEventListener('keydown', function(e) {
            if (@json($showImageModal)) {
                if (e.key === 'Escape') {
                    console.log('Closing modal with Escape');
                    @this.call('closeImageModal');
                } else if (e.key === 'ArrowLeft') {
                    console.log('Previous image');
                    @this.call('previousImage');
                } else if (e.key === 'ArrowRight') {
                    console.log('Next image');
                    @this.call('nextImage');
                }
            }
        });

        // Close modal on backdrop click
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('fixed') && e.target.classList.contains('inset-0')) {
                console.log('Backdrop clicked, closing modal');
                @this.call('closeImageModal');
            }
        });

        // Fallback click handlers for gallery and cover images
        document.addEventListener('click', function(e) {
            // Handle gallery image clicks
            if (e.target.closest('[data-gallery-index]')) {
                const galleryItem = e.target.closest('[data-gallery-index]');
                const index = parseInt(galleryItem.getAttribute('data-gallery-index'));
                console.log('Gallery image clicked, index:', index);
                @this.call('openImageModal', index);
            }
            
            // Handle cover image clicks
            if (e.target.closest('[data-cover-image]')) {
                console.log('Cover image clicked');
                @this.call('openImageModal', -1);
            }
        });

        // Additional click handler for image gallery items
        document.addEventListener('livewire:init', function () {
            console.log('Livewire initialized');
        });
    </script>
</div>
@endif
