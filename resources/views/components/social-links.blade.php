<div class="flex flex-wrap justify-center space-x-2 items-center">
    @forelse($links as $platform => $url)
        <a href="{{ $url }}" 
           target="{{ $platform === 'email' ? '_self' : '_blank' }}"
           rel="noopener"
           class="{{ $sizeClass }} {{ $networks[$platform]['hover'] }} bg-gray-50 rounded-full flex items-center justify-center transition-colors" 
           title="{{ ucfirst($platform) }}">
            <i class="{{ $networks[$platform]['icon'] }} {{ $networks[$platform]['color'] }}"></i>
        </a>
    @empty
        <!-- No social links available -->
    @endforelse
</div>
