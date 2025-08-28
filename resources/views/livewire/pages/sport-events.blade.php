<div>
    <!-- Hero Section -->
    <div style="background-image: url('./assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>


    <!-- Events Grid -->
    <section class="bg-gray-50 py-16">
        <div class="w-11/12 lg:w-10/12 mx-auto">
            @if($events->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" data-aos="fade-up">
                    @foreach ($events as $event)
                        <div class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden">
                            <!-- Image Container -->
                            <div class="relative overflow-hidden h-48">
                                <img 
                                    src="{{ $event->main_image }}" 
                                    alt="{{ $event->title }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                >
                                
                                <!-- Status Badge -->
                                <div class="absolute top-4 left-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                               {{ $event->status === 'Болашақ' ? 'bg-green-100 text-green-800' : 
                                                  ($event->status === 'Өткізілуде' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                        {{ $event->status }}
                                    </span>
                                </div>
                                
                                <!-- Type Badge -->
                                <div class="absolute top-4 right-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/90 text-gray-800">
                                        {{ $event->type_name }}
                                    </span>
                                </div>
                                
                                <!-- Featured Badge -->
                                @if($event->is_featured)
                                    <div class="absolute bottom-4 left-4">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-star mr-1"></i>Ұсынылған
                                        </span>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="font-bold text-xl text-gray-900 mb-3 line-clamp-2">
                                    {{ $event->title }}
                                </h3>
                                
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                    {{ $event->description }}
                                </p>
                                
                                <!-- Event Details -->
                                <div class="space-y-2 text-sm text-gray-500 mb-4">
                                   
                                    
                                    @if($event->location)
                                        <div class="flex items-center">
                                            <i class="fas fa-map-marker-alt mr-2 text-red-500"></i>
                                            <span>{{ $event->location }}</span>
                                        </div>
                                    @endif
                                    
                                    @if($event->participants_limit)
                                        <div class="flex items-center">
                                            <i class="fas fa-users mr-2 text-green-500"></i>
                                            <span>{{ $event->participants_count }}/{{ $event->participants_limit }} қатысушы</span>
                                        </div>
                                    @endif
                                    
                                </div>
                                
                                <!-- Action Buttons -->
                                <div class="flex gap-2">
                                    <a href="{{ route('sport-event.view', $event->id) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors text-center">
                                        Толығырақ
                                    </a>
                                    @if($event->hasAvailableSpots() && $event->status === 'Болашақ')
                                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                                            Қатысу
                                        </button>
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
                            <i class="fas fa-trophy text-4xl text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Іс-шаралар табылмады</h3>
                        <p class="text-gray-600">Таңдалған критерийлер бойынша іс-шаралар жоқ</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush
