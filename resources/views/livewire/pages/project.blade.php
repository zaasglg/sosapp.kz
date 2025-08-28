<main>
    <div style="background-image: url('assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section class="py-12 bg-gray-50">
        <div class="w-10/12 mx-auto">
            <h2 class="text-center text-3xl font-bebas">Ғылым</h2>

            <ul class="space-y-3 mt-10">
                @foreach ($projects as $project)
                    <li class="bg-white shadow overflow-hidden px-4 py-4 sm:px-6 sm:rounded-md ">
                        <span>{{ $project->name }}</span>
                        <div class="mt-5">
                            <a href="{{ asset('/storage/' . $project->docuent_link) }}" target="_blank"
                                class="bg-gray-100 inline-flex items-center px-5 py-2 rounded hover:bg-gray-200 space-x-4">
                                <span class="">Жүктеу</span>
                                <i class="fa-solid fa-cloud-arrow-down"></i>
                            </a>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </section>
</main>
