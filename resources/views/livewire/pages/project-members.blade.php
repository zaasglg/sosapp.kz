<div>
    <!-- Hero Section -->
    <div style="background-image: url('./assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>


    <!-- All Members Grid -->
    <section class="bg-gradient-to-b from-white via-gray-50 to-white py-24">
        <div class="container px-6 mx-auto max-w-7xl">
            <h1 class="text-4xl font-bold text-gray-800 mb-3 text-center">Жоба мүшелері</h1>
            <p class="text-gray-500 text-center mb-12 max-w-xl mx-auto">Біздің командамыздың тәжірибелі мамандары</p>
            
            @if($members->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 md:gap-10" data-aos="fade-up">
                    @foreach ($members as $member)
                        <div class="member-card group bg-white rounded-2xl overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl">
                            <!-- Image with overlay effect -->
                            <div class="relative overflow-hidden">
                                <a href="{{ route('project-member.view', $member->id) }}" class="block">
                                    @if($member->avatar_path)
                                        <img src="{{ asset('storage/' . $member->avatar_path) }}" 
                                             alt="{{ $member->full_name }}"
                                             class="w-full h-64 object-cover transform transition-transform duration-700 group-hover:scale-105">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-40 group-hover:opacity-60 transition-opacity duration-300"></div>
                                    @else
                                        <div class="w-full h-64 bg-gradient-to-br from-indigo-600 to-blue-500 flex items-center justify-center overflow-hidden group-hover:from-indigo-500 group-hover:to-blue-400 transition-all duration-300">
                                            <span class="text-5xl font-bold text-white">{{ $member->initials }}</span>
                                        </div>
                                    @endif
                                </a>
                                
                                <!-- Elegant status indicator -->
                                @if($member->status)
                                    <div class="absolute top-4 right-4 h-2 w-2 rounded-full
                                        {{ $member->status === 'active' ? 'bg-green-500' : 
                                           ($member->status === 'alumni' ? 'bg-blue-500' : 'bg-gray-400') }}">
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Refined Info Section -->
                            <div class="px-6 py-5 text-center">
                                <a href="{{ route('project-member.view', $member->id) }}" class="block">
                                    <h3 class="font-semibold text-lg text-gray-800 mb-1.5 group-hover:text-indigo-600 transition-colors">
                                        {{ $member->full_name }}
                                    </h3>
                                    <p class="text-indigo-600 font-medium text-sm mb-2">
                                        {{ $member->position }}
                                    </p>
                                </a>
                                
                                <!-- Department with subtle styling -->
                                @if($member->department)
                                    <div class="text-xs text-gray-500 mb-4">
                                        {{ $member->department }}
                                    </div>
                                @endif
                                
                                <!-- Social Links with refined styling -->
                                <div class="flex justify-center items-center space-x-3 pt-3 border-t border-gray-100">
                                    <x-social-links :member="$member" size="sm" :show-email="false" />
                                    
                                    <a href="{{ route('project-member.view', $member->id) }}" 
                                       class="w-9 h-9 bg-indigo-100 hover:bg-indigo-200 text-indigo-600 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110" 
                                       title="Профильді қарау">
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State - Elegant design -->
                <div class="text-center py-28">
                    <div class="max-w-md mx-auto bg-white p-12 rounded-2xl shadow-md border border-gray-100">
                        <div class="bg-gradient-to-r from-indigo-100 to-blue-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-8">
                            <i class="fas fa-users text-3xl text-indigo-500 opacity-80"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Мүшелер табылмады</h3>
                        <p class="text-gray-500">Таңдалған фильтрлер бойынша мүшелер жоқ</p>
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
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* Elegant card design with refined animations */
    .member-card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        backface-visibility: hidden;
        will-change: transform, box-shadow;
    }
    
    .member-card:hover {
        transform: translateY(-8px);
    }
    
    /* Beautiful focus state */
    .member-card:focus-within {
        outline: none;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
    }
    
    /* Typography refinements */
    .member-card h3 {
        letter-spacing: -0.01em;
    }
    
    /* Image hover effects */
    .member-card img {
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        backface-visibility: hidden;
        will-change: transform, filter;
    }
    
    /* Add subtle animation to cards */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .member-card {
        animation: fadeInUp 0.6s ease-out forwards;
        animation-delay: calc(var(--card-index, 0) * 0.1s);
        opacity: 0;
    }
</style>

<script>
    // Add animation delays to cards for staggered appearance
    document.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.member-card');
        cards.forEach((card, index) => {
            card.style.setProperty('--card-index', index);
        });
    });
</script>
@endpush
