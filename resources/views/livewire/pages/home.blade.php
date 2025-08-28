<main class="bg-gray-50">

    <section class="relative bg-center bg-cover bg-fixed"
        style="background-image: url({{ asset('assets/images/home.jpg') }})">
        <div class="absolute bg-gray-800 bg-opacity-80 top-0 left-0 w-full h-full"></div>
        <div class="relative z-10">

            <livewire:components.header />


            <div class="w-11/12 lg:w-10/12 mx-auto lg:pb-0">


                <div class="pb-36 pt-12">
                    <div class="flex flex-col items-center justify-center" data-aos="fade-up">
                        <h1 class="mb-8 philosopher-regular flex max-w-5xl text-center text-4xl font-semibold leading-none tracking-tight text-white md:text-5xl uppercase">
                            Sosapp.kz Порталына <br> қош келдіңіз.
                        </h1>
                        <p class="max-w-4xl text-center text-lg leading-normal text-gray-400">
                            Бұл портал «Дүниежүзілік денсаулық сақтау ұйымы шкаласы ((WHOQOLBREF) KАZ) көрсеткіштерін талдау негізінде жоғары оқу орны білімгерлерінің салауатты өмір салтын қалыптастыру» (ЖТН: AP19676522) тақырыбындағы гранттық қаржыландыру жобасы аясында Қазақстан Республикасы Ғылым және жоғары білім министрлігі Ғылым комитетінің қаржылық қолдауымен әзірленді.
                        </p>

                        <div class="mx-auto mt-8 flex w-full max-w-2xl justify-center gap-2">
                            <div class="mt-3 rounded-lg sm:mt-0">
                                <a href="{{ route('profile') }}"
                                    class="block items-center rounded-xl bg-blue-600 px-5 py-4 text-center text-base font-medium text-white transition duration-500 ease-in-out hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 lg:px-10 uppercase">
                                    Жеке кабинет
                                </a>
                            </div>
                            <div class="mt-3 rounded-lg sm:ml-3 sm:mt-0">
                                <a href="{{ route('contact') }}"
                                    class="flex items-center rounded-xl border border-white px-5 py-4 text-center font-medium text-white transition duration-500 ease-in-out hover:text-blue-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 lg:px-8 uppercase">
                                    Жоба жетекшісімен байланыс
                                    <svg width="24" height="24" viewBox="0 0 24 24" class="ml-1 size-6">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" d="M5 12h14m-4 4l4-4m-4-4l4 4">
                                        </path>
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-11/12 lg:w-10/12 mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 -mt-[4%]">
    
        <!-- Карточка 1 -->
        <div class="relative p-5 flex flex-col items-start bg-white rounded-xl shadow-sm transition-all">
            <div class="relative z-1">
                <div class="text-left">
                    <i class="fa-solid fa-atom text-3xl text-sky-500"></i>
                </div>

                <h2 class="uppercase text-left font-bold mt-4 text-lg">WHOQOL-BREF KАZ шкала тесті</h2>
    
                <p class="mt-3 font-thin">
                    САЛАУАТТЫ ӨМІР САЛТЫ ШКАЛАСЫ.
                </p>
    
                <a href="https://forms.gle/Rob1PAvB5MzMibyZ8" class="mt-5 block space-x-1" target="_blank">
                    <span class="text-sky-500 font-semibold">Толығырақ Оқу <i class="fa-solid fa-angle-right text-blue-500 text-[11px]"></i></span>
                </a>
            </div>

            <div class="absolute top-2 right-2">
                <i class="fa-solid fa-atom text-6xl text-gray-100"></i>
            </div>
        </div>
    
        <div class="relative p-5 flex flex-col items-start bg-white rounded-xl shadow-sm transition-all">
            <div class="relative z-1">
                <div class="text-left">
                    <i class="fa-solid fa-calculator text-3xl text-sky-500"></i>
                </div>

                <h2 class="uppercase text-left font-bold mt-4 text-lg">Калория калькуляторы</h2>
    
                <p class="mt-3 font-thin">
                    Калория есептегіш калькулятор
                </p>
    
                <a href="{{ route('calculator') }}" class="mt-5 block space-x-1">
                    <span class="text-sky-500 font-semibold">Толығырақ Оқу <i class="fa-solid fa-angle-right text-blue-500 text-[11px]"></i></span>
                </a>
            </div>

            <div class="absolute top-2 right-2">
                <i class="fa-solid fa-calculator text-6xl text-gray-100"></i>
            </div>
        </div>

        <div class="relative p-5 flex flex-col items-start bg-white rounded-xl shadow-sm transition-all">
            <div class="relative z-1">
                <div class="text-left">
                    <i class="fa-solid fa-user text-3xl text-sky-500"></i>
                </div>

                <h2 class="uppercase text-left font-bold mt-4 text-lg">Өз-өзін тану тесті</h2>
    
                <p class="mt-3 font-thin">
                    Өз-өзін тану тест сұрақтары.
                </p>
    
                <a href="{{ route('test') }}" class="mt-5 block space-x-1">
                    <span class="text-sky-500 font-semibold">Толығырақ Оқу <i class="fa-solid fa-angle-right text-blue-500 text-[11px]"></i></span>
                </a>
            </div>

            <div class="absolute top-2 right-2">
                <i class="fa-solid fa-user text-6xl text-gray-100"></i>
            </div>
        </div>

    </section>
    
    
    
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


    <section id="app" class="bg-white bg-app-pattern shadow-xl overflow-hidden" data-aos="fade-left">
        <div class="w-11/12 lg:w-10/12 mx-auto py-24">
            <div class="grid items-center grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="flex justify-center">
                    <img src="{{ asset('assets/images/моб.png') }}" alt="Sosapp.kz App">
                </div>
                <div>
                    <h2 class="text-4xl font-extrabold text-grayw-900 leading-tight philosopher-regular">Sosapp.kz - Салуатты өмір салты</h2>
                    <p class="mt-5 text-lg text-gray-600 leading-relaxed">
                        Бұқаралық спорт арқылы халықтың денсаулығын нығайту және физикалық белсенділікті арттыру мақсатында кең таралған спорттық іс-шараларды ұйымдастыруға болады. Ол әртүрлі жастағы және деңгейдегі адамдарды қамтиды, спортқа қатысуға ынталандырады.
                    </p>
                    <p class="mt-3 text-lg text-gray-600 leading-relaxed">
                        Салауатты өмір салты - дұрыс тамақтану, белсенділік, демалыс және зиянды әдеттерден аулақ болу арқылы денсаулықты сақтау және жақсарту жүйесі. Бұл өмір сапасын арттырып, ұзақ әрі белсенді өмір сүруге ықпал етеді.
                    </p>
                    <div class="flex flex-wrap gap-4 mt-6">
                        <a href="https://apps.apple.com/kz/app/sosapp-салауатты-өмір-салты/id6743409347" target="_blank" class="flex items-center bg-black hover:bg-gray-800 text-white rounded-lg px-5 py-3 shadow-md transition">
                            <svg class="mr-3 w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="currentColor">
                                <path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9z"/>
                            </svg>
                            <div class="text-left">
                                <div class="text-xs">Download on the</div>
                                <div class="text-sm font-semibold">App Store</div>
                            </div>
                        </a>
                        <a href="https://sosapp.kz/app.apk" download target="_blank" class="flex items-center bg-black hover:bg-gray-800 text-white rounded-lg px-5 py-3 shadow-md transition">
                            <svg class="mr-3 w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                                <path d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z"/>
                            </svg>
                            <div class="text-left">
                                <div class="text-xs">Get it on</div>
                                <div class="text-sm font-semibold">Google Play</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

</main>


@section('style')
    <style>
        #app {
            background-color: white;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='250' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='0.02'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/svg%3E")
        }
    </style>
@endsection
