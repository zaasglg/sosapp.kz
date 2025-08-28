<div>
    <div style="background-image: url('/assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section class="bg-gray-50">
        <div class="w-10/12 mx-auto py-24">
            <h2 class="text-center text-3xl font-bebas">{{ $book->name }}</h2>

            <!-- Обложка книги -->
            @if($book->cover_image)
                <div class="flex justify-center mt-8 mb-10">
                    <div class="max-w-sm">
                        <img
                            src="{{ asset('storage/' . $book->cover_image) }}"
                            alt="{{ $book->name }}"
                            class="w-full h-auto rounded-lg shadow-lg"
                        >
                    </div>
                </div>
            @endif

            <div class="flex items-center justify-center mt-10">
                <div class="text-center">
                    <p class="mb-4">{{ $book->description }}</p>
                    <p class="text-sm text-gray-600">Баспа: {{ $book->press }}</p>
                </div>
            </div>

            <div class="mt-10">
                @if($book->pdf_path)
                    <iframe src="{{ asset('storage/' . $book->pdf_path) }}" frameborder="0" width="100%" height="800"></iframe>
                @else
                    <div class="text-center py-20">
                        <p class="text-gray-500">PDF файлы табылмады</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @include('layouts.footer')
</div>
