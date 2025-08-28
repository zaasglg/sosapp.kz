@if($event)
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
                <a href="{{ route('sport-events') }}" 
                   class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-all duration-300">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Артқа қайту
                </a>
            </div>

            <!-- Event Header -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 border border-gray-200 mb-8">
                <!-- Title and Status -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4 md:mb-0 leading-tight">
                        {{ $event->title }}
                    </h1>
                    <div class="flex gap-2">
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium 
                                   {{ $event->status === 'Болашақ' ? 'bg-green-100 text-green-800' : 
                                      ($event->status === 'Өткізілуде' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                            {{ $event->status }}
                        </span>
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            {{ $event->type_name }}
                        </span>
                    </div>
                </div>

                <!-- Cover Image -->
                @if($event->main_image)
                    <div class="mb-8">
                        <img
                            src="{{ $event->main_image }}"
                            alt="{{ $event->title }}"
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
                        {{ $event->description }}
                    </div>
                </div>

                <!-- Event Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-900">Іс-шара ақпараты</h3>
                        
                        @if($event->event_date)
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-calendar-alt mr-3 text-blue-500"></i>
                                <span>{{ \Carbon\Carbon::parse($event->event_date)->format('d.m.Y') }}</span>
                            </div>
                        @endif
                        
                        @if($event->event_time)
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-clock mr-3 text-green-500"></i>
                                <span>{{ $event->event_time }}</span>
                            </div>
                        @endif
                        
                        @if($event->location)
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-map-marker-alt mr-3 text-red-500"></i>
                                <span>{{ $event->location }}</span>
                            </div>
                        @endif
                        
                        @if($event->duration)
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-hourglass-half mr-3 text-purple-500"></i>
                                <span>{{ $event->duration }}</span>
                            </div>
                        @endif
                    </div>
                    
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-900">Қатысу ақпараты</h3>
                        
                        @if($event->participants_limit)
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-users mr-3 text-indigo-500"></i>
                                <span>{{ $event->participants_count }}/{{ $event->participants_limit }} қатысушы</span>
                            </div>
                        @endif
                        
                        @if($event->registration_deadline)
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-user-check mr-3 text-orange-500"></i>
                                <span>Тіркелу мерзімі: {{ \Carbon\Carbon::parse($event->registration_deadline)->format('d.m.Y') }}</span>
                            </div>
                        @endif
                        
                        @if($event->entry_fee)
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-money-bill-wave mr-3 text-yellow-500"></i>
                                <span>Қатысу ақысы: {{ $event->entry_fee }} тенге</span>
                            </div>
                        @endif
                        
                        @if($event->contact_info)
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-phone mr-3 text-pink-500"></i>
                                <span>{{ $event->contact_info }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Requirements -->
                @if($event->requirements)
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Талаптар</h3>
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                            <div class="text-gray-700 whitespace-pre-line">{{ $event->requirements }}</div>
                        </div>
                    </div>
                @endif

                <!-- Prizes -->
                @if($event->prizes)
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-trophy mr-2 text-yellow-500"></i>
                            Марапаттар
                        </h3>
                        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4">
                            <div class="text-gray-700 whitespace-pre-line">{{ $event->prizes }}</div>
                        </div>
                    </div>
                @endif

                <!-- Gallery -->
                @if($event->galleryItems && $event->galleryItems->count() > 0)
                    <div class="bg-gray-50 rounded-2xl p-6 mb-8">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Галерея ({{ $event->galleryItems->count() }} сурет)
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach($event->galleryItems as $index => $item)
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
                                    @if($item->title)
                                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-70 text-white p-2 rounded-b-xl">
                                            <p class="text-sm font-medium truncate">{{ $item->title }}</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Action Buttons -->
                @if($event->status === 'Болашақ')
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        @if($event->hasAvailableSpots())
                            <button 
                                wire:click="participateInEvent"
                                class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-user-plus mr-2"></i>
                                Іс-шараға қатысу
                            </button>
                        @else
                            <div class="bg-gray-100 text-gray-500 px-8 py-3 rounded-xl font-semibold text-lg text-center">
                                <i class="fas fa-users mr-2"></i>
                                Орындар толған
                            </div>
                        @endif
                        
                        @if($event->contact_info)
                            <a href="tel:{{ $event->contact_info }}" 
                               class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 text-center">
                                <i class="fas fa-phone mr-2"></i>
                                Хабарласу
                            </a>
                        @endif
                    </div>
                @endif

            </div>
        </div>
    </section>

    @include('layouts.footer')

    <!-- Image Modal -->
    @if($showImageModal && $event && ($event->galleryItems->count() > 0 || $event->main_image))
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
                    $totalImages = $event->galleryItems->count();
                    $hasCover = $event->main_image ? 1 : 0;
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
                @if($currentImageIndex === -1 && $event->main_image)
                    <!-- Show cover image -->
                    <div class="flex flex-col items-center justify-center max-w-full max-h-full">
                        <img
                            src="{{ $event->main_image }}"
                            alt="{{ $event->title }}"
                            class="max-w-full max-h-[85vh] object-contain rounded-lg"
                        >

                        <!-- Image info -->
                        <div class="mt-4 text-center text-white bg-black bg-opacity-70 rounded-lg p-4 max-w-lg">
                            <h3 class="text-lg font-semibold mb-2">{{ $event->title }}</h3>
                            <p class="text-sm text-gray-300">Негізгі сурет</p>
                            <p class="text-xs text-gray-400 mt-2">
                                Негізгі сурет / {{ $event->galleryItems->count() }} галерея суреті
                            </p>
                        </div>
                    </div>
                @elseif($currentImageIndex >= 0 && $event->galleryItems->count() > 0)
                    <!-- Show gallery image -->
                    @php
                        $currentItem = $event->galleryItems[$currentImageIndex] ?? null;
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
                                        {{ $currentImageIndex + 1 }} / {{ $event->galleryItems->count() }} (галерея)
                                    </p>
                                </div>
                            @else
                                <div class="mt-4 text-center text-white bg-black bg-opacity-70 rounded-lg p-2">
                                    <p class="text-sm text-gray-400">
                                        {{ $currentImageIndex + 1 }} / {{ $event->galleryItems->count() }} (галерея)
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
        console.log('SportEventViewer script loaded');
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
