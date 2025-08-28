<main>
    <div style="background-image: url('assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section class="w-11/12 lg:w-10/12 mx-auto">
        <div class="py-24">
            <div class="border-b border-gray-600 pb-4">
                <h3 class="text-xl font-semibold leading-6 text-gray-800">
                    Соңғы жаңалықтар
                </h3>
            </div>

            <div class="relative mx-auto" data-aos="fade-right">
                <div class="mx-auto mt-12 grid max-w-lg gap-8 lg:max-w-none lg:grid-cols-2">
                    @foreach ($posts as $post)
                    <div class="mb-12 flex cursor-pointer flex-col overflow-hidden">
                        <a href="{{ route('blog.single', ['id' => $post->id]) }}">
                            <div class="shrink-0">
                                <img class="h-48 w-full rounded-lg object-cover"
                                    src="{{ asset('/storage/' . $post->hero) }}" alt="" />
                            </div>
                        </a>
                        <div class="flex flex-1 flex-col justify-between">
                            <a href="/blog-post"></a>
                            <div class="flex-1">
                                <a href="/blog-post">
                                    <div class="flex space-x-1 pt-6 text-sm text-gray-500">
                                        <time datetime="2020-03-10"> 01.12.2024 </time>
                                        <span aria-hidden="true"> · </span>
                                        <span> 4 мин. чтение </span>
                                    </div>
                                </a>
                                <a href="{{ route('blog.single', ['id' => $post->id]) }}" class="mt-2 block space-y-6">
                                    <h3 class="text-2xl font-semibold leading-none tracking-tighter text-gray-600">
                                        {{ $post->title }}
                                    </h3>
                                    <p class="text-lg font-normal text-gray-500">
                                        {{ $post->exception }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
