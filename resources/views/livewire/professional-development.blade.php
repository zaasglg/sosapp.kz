<div>
    <!-- Hero Section with Header -->
    <div style="background-image: url('/assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <!-- Main Content Section -->
    <section class="bg-gradient-to-br from-slate-50 via-white to-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Modern Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-2xl mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent mb-4">
                    Біліктілік арттыру
                </h1>

            </div>
            <!-- Development Programs Grid -->
            @if($developments->count() > 0)
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 mb-12">
                    @foreach($developments as $development)
                        <div class="bg-white/60 backdrop-blur-sm rounded-3xl p-6 border-2 border-gray-200 hover:border-blue-300 transition-all duration-300 hover:scale-[1.02]">
                            <!-- Image -->
                            @if($development->image_path)
                                <div class="mb-4">
                                    <img
                                        src="{{ asset('storage/' . $development->image_path) }}"
                                        alt="{{ $development->title }}"
                                        class="w-full h-32 object-cover rounded-2xl border-2 border-gray-200"
                                    >
                                </div>
                            @endif

                            <!-- Header -->
                            <div class="flex items-center justify-between mb-3">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $development->type_name }}
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ $development->status }}
                                </span>
                            </div>

                            <!-- Title -->
                            <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                                {{ $development->title }}
                            </h3>

                            <!-- Description (shortened) -->
                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                {{ Str::limit($development->description, 80) }}
                            </p>

                            <!-- Basic Info -->
                            <div class="space-y-1 mb-4">
                                @if($development->start_date)
                                    <div class="flex items-center text-xs text-gray-600">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ $development->start_date->format('d.m.Y') }}
                                    </div>
                                @endif

                                @if($development->location)
                                    <div class="flex items-center text-xs text-gray-600">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        </svg>
                                        {{ Str::limit($development->location, 20) }}
                                    </div>
                                @endif
                            </div>

                            <!-- Read More Button -->
                            <div class="mt-auto">
                                <a href="{{ route('professional-development.view', $development->id) }}" 
                                   class="inline-flex items-center justify-center w-full px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-xl hover:bg-blue-700 transition-colors duration-300">
                                    Толығырақ
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-20">

                    <h3 class="text-xl text-gray-400 mb-4">
                        Ештеңке табылмады
                    </h3>
                </div>
            @endif
        </div>
    </section>

    @include('layouts.footer')
</div>
