<div>
    <div style="background-image: url('/assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section class="bg-gray-50">
        <div class="w-10/12 mx-auto py-24">
            <h2 class="text-center text-3xl font-bebas mb-8">{{ $businessTrip->name }}</h2>

            <!-- Обложка командировки -->
            @if($businessTrip->cover_image)
                <div class="flex justify-center mt-8 mb-10">
                    <div class="max-w-2xl w-full">
                        <img
                            src="{{ asset('storage/' . $businessTrip->cover_image) }}"
                            alt="{{ $businessTrip->name }}"
                            class="w-full h-auto rounded-lg shadow-lg"
                        >
                    </div>
                </div>
            @endif

            <!-- Информация о командировке -->
            <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Левая колонка - основная информация -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Іссапар туралы</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">{{ $businessTrip->description }}</p>
                    </div>

                    <!-- Правая колонка - детали -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Мәліметтер</h3>
                        <div class="space-y-4">
                            <!-- Галерея -->
                            @if($businessTrip->galleryItems->count() > 0)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6 text-purple-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Галерея</p>
                                        <p class="text-sm text-gray-600">{{ $businessTrip->galleryItems->count() }} сурет</p>
                                    </div>
                                </div>
                            @endif

                            <!-- YouTube видео -->
                            @if($businessTrip->youtube_video_url)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6 text-red-600 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">YouTube видео</p>
                                        <p class="text-sm text-gray-600">Қарау үшін видеоны басыңыз</p>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <!-- YouTube видео -->
            @if($businessTrip->youtube_video_url)
                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6">Іссапар видеосы</h3>
                    <div class="flex justify-center">
                        <div class="w-full max-w-3xl aspect-video">
                            <iframe 
                                class="w-full h-[450px] rounded-lg shadow-lg"
                                src="{{ str_replace('watch?v=', 'embed/', $businessTrip->youtube_video_url) }}" 
                                title="{{ $businessTrip->name }}"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Галерея изображений -->
            @if($businessTrip->galleryItems->count() > 0)
                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6">Іссапар галереясы</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="gallery-container">
                        @foreach($businessTrip->galleryItems->sortBy('sort_order') as $item)
                            <div class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 cursor-pointer gallery-item" 
                                data-src="{{ asset('storage/' . $item->image_path) }}"
                                data-title="{{ $item->title }}"
                                data-description="{{ $item->description }}">
                                <img
                                    src="{{ asset('storage/' . $item->image_path) }}"
                                    alt="{{ $item->title }}"
                                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300"
                                >
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-opacity duration-300 flex items-end">
                                    <div class="p-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <h4 class="font-semibold">{{ $item->title }}</h4>
                                        @if($item->description)
                                            <p class="text-sm mt-1">{{ Str::limit($item->description, 60) }}</p>
                                        @endif
                                    </div>
                                </div>
                                @if($item->is_featured)
                                    <div class="absolute top-2 right-2">
                                        <span class="bg-yellow-500 text-white text-xs px-2 py-1 rounded-full">
                                            <svg class="w-3 h-3 inline" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Модальное окно для увеличенных изображений -->
            <div id="lightbox-modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden items-center justify-center">
                <div class="relative w-11/12 max-w-4xl">
                    <button id="lightbox-close" class="absolute top-4 right-4 text-white hover:text-gray-300 focus:outline-none z-10">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    
                    <div class="flex items-center justify-between">
                        <button id="prev-button" class="text-white p-2 hover:text-gray-300 focus:outline-none">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        
                        <div class="flex-1">
                            <div class="flex justify-center">
                                <img id="lightbox-img" class="max-h-[80vh] max-w-full object-contain" src="" alt="">
                            </div>
                            <div class="p-4 bg-black bg-opacity-50 text-white mt-2">
                                <h3 id="lightbox-title" class="text-xl font-semibold"></h3>
                                <p id="lightbox-description" class="mt-2 text-sm"></p>
                            </div>
                        </div>
                        
                        <button id="next-button" class="text-white p-2 hover:text-gray-300 focus:outline-none">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Навигация -->
            <div class="flex justify-between items-center">
                <a
                    href="{{ route('business-trips.list') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors duration-200"
                >
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                    </svg>
                    Іссапарлар тізіміне оралу
                </a>
            </div>
        </div>
    </section>

    @include('layouts.footer')
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const lightboxModal = document.getElementById('lightbox-modal');
            const lightboxImg = document.getElementById('lightbox-img');
            const lightboxTitle = document.getElementById('lightbox-title');
            const lightboxDescription = document.getElementById('lightbox-description');
            const closeButton = document.getElementById('lightbox-close');
            const prevButton = document.getElementById('prev-button');
            const nextButton = document.getElementById('next-button');
            const galleryItems = document.querySelectorAll('.gallery-item');
            
            let currentIndex = 0;
            
            // Open lightbox when clicking on a gallery item
            galleryItems.forEach((item, index) => {
                item.addEventListener('click', function() {
                    currentIndex = index;
                    const imgSrc = this.getAttribute('data-src');
                    const imgTitle = this.getAttribute('data-title');
                    const imgDescription = this.getAttribute('data-description');
                    
                    lightboxImg.src = imgSrc;
                    lightboxTitle.textContent = imgTitle;
                    lightboxDescription.textContent = imgDescription;
                    
                    lightboxModal.classList.remove('hidden');
                    lightboxModal.classList.add('flex');
                    
                    // Prevent body scrolling when lightbox is open
                    document.body.style.overflow = 'hidden';
                });
            });
            
            // Close lightbox
            closeButton.addEventListener('click', closeLightbox);
            
            // Close lightbox when clicking outside the image
            lightboxModal.addEventListener('click', function(e) {
                if (e.target === lightboxModal) {
                    closeLightbox();
                }
            });
            
            // Handle keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (!lightboxModal.classList.contains('hidden')) {
                    if (e.key === 'Escape') {
                        closeLightbox();
                    } else if (e.key === 'ArrowLeft') {
                        showPrevImage();
                    } else if (e.key === 'ArrowRight') {
                        showNextImage();
                    }
                }
            });
            
            // Previous image
            prevButton.addEventListener('click', showPrevImage);
            
            // Next image
            nextButton.addEventListener('click', showNextImage);
            
            function showPrevImage() {
                currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
                updateLightboxContent();
            }
            
            function showNextImage() {
                currentIndex = (currentIndex + 1) % galleryItems.length;
                updateLightboxContent();
            }
            
            function updateLightboxContent() {
                const currentItem = galleryItems[currentIndex];
                const imgSrc = currentItem.getAttribute('data-src');
                const imgTitle = currentItem.getAttribute('data-title');
                const imgDescription = currentItem.getAttribute('data-description');
                
                lightboxImg.src = imgSrc;
                lightboxTitle.textContent = imgTitle;
                lightboxDescription.textContent = imgDescription;
            }
            
            function closeLightbox() {
                lightboxModal.classList.add('hidden');
                lightboxModal.classList.remove('flex');
                document.body.style.overflow = '';
            }
        });
    </script>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const galleryItems = document.querySelectorAll('.gallery-item');
        const lightboxModal = document.getElementById('lightbox-modal');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxDescription = document.getElementById('lightbox-description');
        const closeButton = document.getElementById('lightbox-close');
        const prevButton = document.getElementById('prev-button');
        const nextButton = document.getElementById('next-button');

        let currentIndex = 0;

        function openLightbox(index) {
            const item = galleryItems[index];
            const src = item.getAttribute('data-src');
            const title = item.getAttribute('data-title');
            const description = item.getAttribute('data-description');

            lightboxImg.src = src;
            lightboxTitle.textContent = title;
            lightboxDescription.textContent = description;

            currentIndex = index;
            lightboxModal.classList.remove('hidden');
        }

        function closeLightbox() {
            lightboxModal.classList.add('hidden');
        }

        function showPrevImage() {
            if (currentIndex > 0) {
                openLightbox(currentIndex - 1);
            }
        }

        function showNextImage() {
            if (currentIndex < galleryItems.length - 1) {
                openLightbox(currentIndex + 1);
            }
        }

        galleryItems.forEach((item, index) => {
            item.addEventListener('click', () => openLightbox(index));
        });

        closeButton.addEventListener('click', closeLightbox);
        prevButton.addEventListener('click', showPrevImage);
        nextButton.addEventListener('click', showNextImage);

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!lightboxModal.classList.contains('hidden')) {
                if (e.key === 'ArrowLeft') {
                    showPrevImage();
                } else if (e.key === 'ArrowRight') {
                    showNextImage();
                } else if (e.key === 'Escape') {
                    closeLightbox();
                }
            }
        });
    });
</script>
