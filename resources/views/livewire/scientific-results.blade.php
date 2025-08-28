<div>
    <!-- Hero Section with Header -->
    <div style="background-image: url('/assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <!-- Main Content Section -->
    <section class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Modern Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-2xl mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent mb-4">
                    Жобаның ғылыми нәтижелері
                </h1>
                <p class="text-lg text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Жобаның ғылыми нәтижелері мен жетістіктерін БАҚ-та (мақалалар, сұхбаттар) және әлеуметтік желілерде насихаттау
                </p>
            </div>

            <!-- Filter Tabs -->
            <div class="flex justify-center mb-12">
                <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-2 border-2 border-gray-200">
                    <div class="flex space-x-2">
                        @foreach($types as $key => $label)
                            <button
                                wire:click="$set('selectedType', '{{ $key }}')"
                                class="px-6 py-3 rounded-xl font-medium transition-all duration-300 {{ $selectedType === $key ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-gray-100' }}"
                            >
                                {{ $label }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Results Grid -->
            @if($results->count() > 0)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                    @foreach($results as $result)
                        <div class="bg-white/60 backdrop-blur-sm rounded-3xl p-6 border-2 border-gray-200 hover:border-blue-300 transition-all duration-300 hover:scale-[1.02]">
                            <!-- Type Badge -->
                            <div class="flex items-center justify-between mb-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    {{ $result->type_name }}
                                </span>
                                @if($result->published_at)
                                    <span class="text-sm text-gray-500">
                                        {{ $result->published_at->format('d.m.Y') }}
                                    </span>
                                @endif
                            </div>

                            <!-- Title -->
                            <h3 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2">
                                {{ $result->title }}
                            </h3>

                            <!-- Description -->
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $result->description }}
                            </p>

                            <!-- Source -->
                            @if($result->source)
                                <div class="flex items-center mb-4">
                                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0 9c-1.657 0-3-4.03-3-9s1.343-9 3-9m0 9v9"></path>
                                    </svg>
                                    <span class="text-sm text-gray-600">{{ $result->source }}</span>
                                </div>
                            @endif

                            <!-- Actions -->
                            <div class="flex space-x-3">
                                @if($result->url)
                                    <a
                                        href="{{ $result->url }}"
                                        target="_blank"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors duration-200"
                                    >
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                        Көру
                                    </a>
                                @endif

                                @if($result->pdf_path)
                                    <button
                                        onclick="openPdfModal('{{ asset('storage/' . $result->pdf_path) }}', '{{ $result->title }}')"
                                        class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition-colors duration-200"
                                    >
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        PDF
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-20">
                    <div class="w-20 h-20 bg-blue-600 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">
                        Нәтижелер табылмады
                    </h3>
                    <p class="text-gray-600">
                        Таңдалған санат бойынша ғылыми нәтижелер әлі жоқ.
                    </p>
                </div>
            @endif
        </div>
    </section>

    {{-- @include('layouts.footer') --}}

    <!-- PDF Modal -->
    <div id="pdfModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-3xl p-6 max-w-6xl w-full mx-4 max-h-[90vh] overflow-hidden">
            <div class="flex justify-between items-center mb-4">
                <h3 id="pdfTitle" class="text-xl font-bold text-gray-900"></h3>
                <button onclick="closePdfModal()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <iframe id="pdfFrame" src="" frameborder="0" width="100%" height="600" class="rounded-xl"></iframe>
        </div>
    </div>

    <script>
        function openPdfModal(pdfUrl, title) {
            document.getElementById('pdfModal').classList.remove('hidden');
            document.getElementById('pdfFrame').src = pdfUrl;
            document.getElementById('pdfTitle').textContent = title;
            document.body.style.overflow = 'hidden';
        }

        function closePdfModal() {
            document.getElementById('pdfModal').classList.add('hidden');
            document.getElementById('pdfFrame').src = '';
            document.body.style.overflow = 'auto';
        }

        // Close modal on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePdfModal();
            }
        });

        // Close modal on backdrop click
        document.getElementById('pdfModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePdfModal();
            }
        });
    </script>
</div>
