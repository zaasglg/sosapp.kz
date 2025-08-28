<div>
    <!-- Hero Section -->
    <div style="background-image: url('/assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>



    <!-- Certificates Grid -->
    <section class="bg-gray-50 py-16">
        <div class="w-11/12 lg:w-10/12 mx-auto">
            @if($certificates->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" data-aos="fade-up">
                    @foreach ($certificates as $certificate)
                        <div class="group relative bg-white rounded-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden">
                            <!-- Image Container -->
                            <div class="relative overflow-hidden">
                                <img 
                                    src="{{ $certificate->image_path ? asset('storage/' . $certificate->image_path) : asset('assets/project/6/1.jpeg') }}" 
                                    alt="{{ $certificate->title }}"
                                    class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110 cursor-pointer lightbox-item"
                                    data-src="{{ $certificate->image_path ? asset('storage/' . $certificate->image_path) : asset('assets/project/6/1.jpeg') }}"
                                >
                                
                                <!-- Overlay with category -->
                                <div class="absolute top-4 left-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $certificate->category_name }}
                                    </span>
                                </div>
                                
                                <!-- Hover overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                
                                <!-- View button -->
                                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0 z-10">
                                    <button type="button" class="bg-white text-gray-900 px-4 py-2 rounded-full text-sm font-semibold hover:bg-gray-100 transition-colors lightbox-trigger" 
                                            data-src="{{ $certificate->image_path ? asset('storage/' . $certificate->image_path) : asset('assets/project/6/1.jpeg') }}"
                                            onclick="openLightbox('{{ $certificate->image_path ? asset('storage/' . $certificate->image_path) : asset('assets/project/6/1.jpeg') }}')">
                                        <i class="fas fa-eye mr-2"></i>Көру
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="font-bold text-lg text-gray-900 mb-2 line-clamp-2">
                                    {{ $certificate->title }}
                                </h3>
                                
                                @if($certificate->description)
                                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                        {{ $certificate->description }}
                                    </p>
                                @endif
                                
                                <div class="space-y-2 text-sm text-gray-500">
                                    @if($certificate->organization)
                                        <div class="flex items-center">
                                            <i class="fas fa-building mr-2 text-blue-500"></i>
                                            <span>{{ $certificate->organization }}</span>
                                        </div>
                                    @endif
                                    
                                    @if($certificate->issued_date)
                                        <div class="flex items-center">
                                            <i class="fas fa-calendar mr-2 text-blue-500"></i>
                                            <span>{{ $certificate->issued_date->format('d.m.Y') }}</span>
                                        </div>
                                    @endif
                                    
                                    @if($certificate->recipient_name)
                                        <div class="flex items-center">
                                            <i class="fas fa-user mr-2 text-blue-500"></i>
                                            <span>{{ $certificate->recipient_name }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="max-w-md mx-auto">
                        <div class="bg-gray-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-certificate text-4xl text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Сертификаттар табылмады</h3>
                        <p class="text-gray-600">Таңдалған категорияда сертификаттар жоқ</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 items-center justify-center z-50 hidden">
        <div class="relative max-w-4xl max-h-full p-4">
            <button id="closeLightbox" class="absolute -top-12 right-0 text-white text-3xl font-bold hover:text-gray-300 transition-colors">
                <i class="fas fa-times"></i>
            </button>
            <img id="lightboxImage" src="" alt="" class="max-w-full max-h-full object-contain rounded-lg">
        </div>
    </div>

    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }
        
        .animate-blob {
            animation: blob 7s infinite;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <script>
    // Global function to open lightbox - needs to be in global scope for onclick
    window.openLightbox = function(imageSrc) {
        console.log('Opening lightbox with:', imageSrc); // Debug log
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightboxImage');
        
        if (lightbox && lightboxImage && imageSrc) {
            lightboxImage.src = imageSrc;
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            document.body.style.overflow = 'hidden';
            console.log('Lightbox opened successfully'); // Debug log
        } else {
            console.error('Lightbox elements not found or no image src provided'); // Debug log
        }
    };

    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightboxImage');
        const closeLightbox = document.getElementById('closeLightbox');
        
        console.log('Lightbox elements found:', { lightbox: !!lightbox, lightboxImage: !!lightboxImage, closeLightbox: !!closeLightbox }); // Debug log
        
        // Open lightbox via event delegation (backup method)
        document.addEventListener('click', function(e) {
            // Check if clicked element or its parent has the lightbox classes
            let target = e.target;
            let imageSrc = null;
            
            // Handle button clicks (including icon inside button)
            if (target.classList.contains('lightbox-trigger') || target.closest('.lightbox-trigger')) {
                e.preventDefault();
                const button = target.classList.contains('lightbox-trigger') ? target : target.closest('.lightbox-trigger');
                imageSrc = button.getAttribute('data-src');
                console.log('Button clicked, image src:', imageSrc); // Debug log
            }
            // Handle direct image clicks
            else if (target.classList.contains('lightbox-item')) {
                e.preventDefault();
                imageSrc = target.getAttribute('data-src') || target.src;
                console.log('Image clicked, image src:', imageSrc); // Debug log
            }
            
            if (imageSrc) {
                window.openLightbox(imageSrc);
            }
        });
        
        // Close lightbox
        if (closeLightbox) {
            closeLightbox.addEventListener('click', function() {
                lightbox.classList.add('hidden');
                lightbox.classList.remove('flex');
                lightboxImage.src = '';
                document.body.style.overflow = '';
                console.log('Lightbox closed'); // Debug log
            });
        }
        
        // Close on background click
        if (lightbox) {
            lightbox.addEventListener('click', function(e) {
                if (e.target === lightbox) {
                    lightbox.classList.add('hidden');
                    lightbox.classList.remove('flex');
                    lightboxImage.src = '';
                    document.body.style.overflow = '';
                    console.log('Lightbox closed by background click'); // Debug log
                }
            });
        }
        
        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && lightbox && !lightbox.classList.contains('hidden')) {
                lightbox.classList.add('hidden');
                lightbox.classList.remove('flex');
                lightboxImage.src = '';
                document.body.style.overflow = '';
                console.log('Lightbox closed by escape key'); // Debug log
            }
        });
    });
    </script>
</div>
