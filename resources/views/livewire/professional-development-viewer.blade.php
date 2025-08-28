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
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Back Button -->
            <div class="mb-8">
                <a href="{{ route('professional-development') }}" 
                   class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-all duration-300">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Артқа қайту
                </a>
            </div>

            <!-- Article Header -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 border border-gray-200">
                <!-- Title -->
                <h1 class="text-4xl font-bold text-gray-900 mb-6 leading-tight">
                    {{ $development->title }}
                </h1>

                <!-- Main Image -->
                @if($development->image_path)
                    <div class="mb-8">
                        <img
                            src="{{ asset('storage/' . $development->image_path) }}"
                            alt="{{ $development->title }}"
                            class="w-full h-64 md:h-96 object-cover rounded-2xl border border-gray-200 cursor-pointer"
                            onclick="openImageModal('{{ asset('storage/' . $development->image_path) }}', '{{ $development->title }}')"
                        >
                    </div>
                @endif

                <!-- Description -->
                <div class="prose prose-lg max-w-none mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Сипаттамасы</h2>
                    <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                        {{ $development->description }}
                    </div>
                </div>

                <!-- PDF File -->
                @if($development->pdf_file)
                    <div class="bg-red-50 rounded-2xl p-6 mb-8">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Құжат
                        </h2>
                        <a href="{{ asset('storage/' . $development->pdf_file) }}" 
                           target="_blank"
                           class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-xl transition-colors duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            PDF жүктеу
                        </a>
                    </div>
                @endif

                <!-- Gallery -->
                @if($development->gallery_images && is_array($development->gallery_images) && count($development->gallery_images) > 0)
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Галерея
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach($development->gallery_images as $index => $image)
                                <div class="relative group cursor-pointer"
                                     onclick="openImageModal('{{ asset('storage/' . $image) }}', '{{ $development->title }} - Сурет {{ $index + 1 }}')">
                                    <img
                                        src="{{ asset('storage/' . $image) }}"
                                        alt="{{ $development->title }} - Сурет {{ $index + 1 }}"
                                        class="w-full h-48 object-cover rounded-xl border border-gray-200 transition-transform duration-300 group-hover:scale-105"
                                    >
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 rounded-xl flex items-center justify-center">
                                        <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                        </svg>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @include('layouts.footer')

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-90 items-center justify-center z-50 hidden p-4">
        <div class="relative w-full h-full flex items-center justify-center">
            <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white text-4xl font-bold hover:text-gray-300 z-10 bg-black bg-opacity-50 rounded-full w-12 h-12 flex items-center justify-center">
                ×
            </button>
            <img id="modalImage" src="" alt="" class="max-w-full max-h-full object-contain rounded-lg">
        </div>
    </div>

    <script>
        function openImageModal(imageUrl, title) {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.getElementById('modalImage').src = imageUrl;
            document.getElementById('modalImage').alt = title;
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.getElementById('modalImage').src = '';
            document.body.style.overflow = 'auto';
        }

        // Close modal on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImageModal();
            }
        });

        // Close modal on backdrop click
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImageModal();
            }
        });
    </script>
</div>
