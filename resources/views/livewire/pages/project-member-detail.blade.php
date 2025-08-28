<div>
    <!-- Hero Section -->
    <div style="background-image: url('/assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section class="bg-gray-50 py-16">
        <div class="w-11/12 lg:w-10/12 mx-auto">
            <!-- Breadcrumbs -->
            <div class="mb-8 flex items-center text-sm text-gray-500">
                <a href="{{ route('project-members') }}" class="hover:text-blue-600 transition-colors">
                    <i class="fas fa-users mr-1"></i> Жоба мүшелері
                </a>
                <span class="mx-2">/</span>
                <span class="text-gray-700">{{ $member->full_name }}</span>
            </div>

            <!-- Member Profile -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Image and Contact Info -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-8">
                        <!-- Profile Image -->
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 py-8 px-6 text-center">
                            @if($member->avatar_path)
                                <img src="{{ asset('storage/' . $member->avatar_path) }}" 
                                     alt="{{ $member->full_name }}"
                                     class="w-36 h-36 rounded-full object-cover border-4 border-white shadow-lg mx-auto">
                            @else
                                <div class="w-36 h-36 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 border-4 border-white shadow-lg mx-auto flex items-center justify-center">
                                    <span class="text-4xl font-bold text-white">{{ $member->initials }}</span>
                                </div>
                            @endif
                            <h1 class="text-white font-bold text-2xl mt-4">{{ $member->full_name }}</h1>
                            <p class="text-blue-100 font-medium">{{ $member->position }}</p>
                            
                            <!-- Status Badge -->
                            <div class="mt-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    {{ $member->status === 'active' ? 'bg-green-100 text-green-800' : 
                                       ($member->status === 'alumni' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                    {{ $member->status_label }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Contact Info -->
                        <div class="p-6 space-y-4">
                            <div class="space-y-2">
                                @if($member->department)
                                    <div class="flex items-center text-sm">
                                        <i class="fas fa-building mr-3 text-blue-500 w-5 text-center"></i>
                                        <span class="text-gray-700">{{ $member->department }}</span>
                                    </div>
                                @endif
                                
                                @if($member->specialization)
                                    <div class="flex items-center text-sm">
                                        <i class="fas fa-user-tie mr-3 text-blue-500 w-5 text-center"></i>
                                        <span class="text-gray-700">{{ $member->specialization }}</span>
                                    </div>
                                @endif
                                
                                @if($member->email)
                                    <div class="flex items-center text-sm">
                                        <i class="fas fa-envelope mr-3 text-blue-500 w-5 text-center"></i>
                                        <a href="mailto:{{ $member->email }}" class="text-gray-700 hover:text-blue-600 break-all">{{ $member->email }}</a>
                                    </div>
                                @endif
                                
                                @if($member->phone)
                                    <div class="flex items-center text-sm">
                                        <i class="fas fa-phone mr-3 text-blue-500 w-5 text-center"></i>
                                        <a href="tel:{{ $member->phone }}" class="text-gray-700 hover:text-blue-600">{{ $member->phone }}</a>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Social Media -->
                            <div class="pt-4 border-t border-gray-100">
                                <h3 class="text-gray-500 font-medium text-sm mb-3">Әлеуметтік желілер</h3>
                                <x-social-links :member="$member" size="lg" />
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column: Bio and Skills -->
                <div class="lg:col-span-2">
                    <!-- About Section -->
                    <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Мүше туралы</h2>
                        
                        @if($member->description)
                            <div class="prose max-w-none text-gray-700 mb-6">
                                <p>{{ $member->description }}</p>
                            </div>
                        @else
                            <div class="bg-gray-50 rounded-lg p-4 text-gray-500 italic">
                                Бұл мүше туралы толық ақпарат әлі қосылмаған.
                            </div>
                        @endif
                        
                        <!-- Skills Section -->
                        @if($member->skills && count($member->skills) > 0)
                            <div class="mt-8">
                                <h3 class="text-xl font-semibold text-gray-800 mb-4">Дағдылар мен білімдер</h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($member->skills as $skill)
                                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">
                                            {{ $skill }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Projects Section -->
                    @if($member->projects && count($member->projects) > 0)
                        <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">Жобалар</h2>
                            
                            <div class="space-y-4">
                                @foreach($member->projects as $project)
                                    <div class="border border-gray-100 rounded-lg p-4 hover:border-blue-200 transition-colors">
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $project }}</h3>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    <!-- Related Members -->
                    @if($relatedMembers->count() > 0)
                        <div class="bg-white rounded-xl shadow-lg p-8">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">Ұқсас мүшелер</h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($relatedMembers as $relatedMember)
                                    <a href="{{ route('project-member.view', $relatedMember->id) }}" class="flex items-center p-3 border border-gray-100 rounded-lg hover:bg-blue-50 transition-colors">
                                        @if($relatedMember->avatar_path)
                                            <img src="{{ asset('storage/' . $relatedMember->avatar_path) }}" 
                                                 alt="{{ $relatedMember->full_name }}"
                                                 class="w-12 h-12 rounded-full object-cover mr-4">
                                        @else
                                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 mr-4 flex items-center justify-center">
                                                <span class="text-sm font-bold text-white">{{ $relatedMember->initials }}</span>
                                            </div>
                                        @endif
                                        
                                        <div>
                                            <h3 class="font-semibold text-gray-900">{{ $relatedMember->full_name }}</h3>
                                            <p class="text-sm text-gray-600">{{ $relatedMember->position }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

@push('styles')
<style>
    .prose p {
        margin-bottom: 1.25rem;
        line-height: 1.7;
    }
    .prose p:last-child {
        margin-bottom: 0;
    }
</style>
@endpush
