<div class="relative">
    <header>
        <nav class="hidden lg:flex w-10/12 mx-auto py-10 justify-between items-center">
            <div class="logo">
                <a href="{{ route('home') }}" class="font-bold text-[30px]">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="" width="80">
                </a>
            </div>

            <div class="block lg:hidden">
                <button aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-offcanvas-example"
                    data-hs-overlay="#hs-offcanvas-example">
                    <i class="fa-solid fa-bars text-white text-xl"></i>
                </button>
            </div>

            <div class="menu hidden lg:flex items-center space-x-5">
                <div class="relative">
                    <a href="{{ route('home') }}" wire:navigate
                        class="uppercase font-bold text-sm w-full text-white {{ Request::is('/') ? 'text-sky-400' : '' }}">
                        Басты бет
                    </a>
                </div>

                <div class="relative">
                    <a href="{{ route('blog') }}" wire:navigate
                        class="uppercase text-white font-bold text-sm w-full {{ Request::is('blog') ? 'text-sky-400' : '' }}">Блог</a>
                </div>

                <div class="relative">
                    <a href="{{ route('projects') }}" wire:navigate
                        class="uppercase text-white font-bold text-sm w-full {{ Request::is('projects') ? 'text-sky-400' : '' }}">Ғылым</a>
                </div>

                <div class="relative">
                    <a href="{{ route('lesson') }}" wire:navigate
                        class="uppercase font-bold text-sm w-full text-white {{ Request::is('video') ? 'text-sky-400' : '' }}">Видео
                        сабақтар</a>
                </div>

                <div class="relative inline-block text-left group">
                    <button type="button"
                        class="inline-flex items-center gap-x-2 uppercase text-white font-bold text-sm rounded-md">
                        Жоба аясында
                        <i class="fa-solid fa-caret-down"></i>
                    </button>

                    <div class="absolute left-0 w-60 bg-white shadow-md rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">
                        <div class="p-1 space-y-1">
                            <a href="{{ route('books.list') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Оқулықтар</a>
                            <a href="{{ route('business-trips.list') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Іс-сапарлары</a>
                            <a href="{{ route('seminars.list') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Халықаралық семинар</a>
                            <a href="{{ route('project.4') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Жобаның ғылыми нәтижелері</a>
                            <a href="{{ route('professional-development') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Біліктілікті арттыру</a>
                            <a href="{{ route('project.6') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Сертификаттар</a>
                        </div>
                    </div>
                </div>


                <div class="relative inline-block text-left group">
                    <button type="button"
                        class="inline-flex items-center gap-x-2 uppercase text-white font-bold text-sm rounded-md">
                        Спорт
                        <i class="fa-solid fa-caret-down"></i>
                    </button>

                    <div class="absolute left-0 w-60 bg-white shadow-md rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">
                        <div class="p-1 space-y-1">
                            <a href="{{ route('nutrition') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Дұрыс тамақтану</a>
                            <a href="{{ route('calculator') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Калория калькуляторы</a>
                            <a href="{{ route('help') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Психологиялық көмек</a>
                            <a href="{{ route('test') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Өз-өзін тану тесті</a>
                            <a href="{{ route('exercises') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Кескінді жаттығулар</a>
                        </div>
                    </div>
                </div>


                <div class="relative">
                    <a href="{{ route('chat') }}" wire:navigate
                        class="uppercase text-white font-bold text-sm w-full {{ Request::is('chat') ? 'text-sky-400' : '' }}">
                        Чат бот
                    </a>
                </div>


            </div>

            <div class="hidden lg:flex justify-between items-center space-x-6">

                <div class="flex space-x-3">
                    <button
                        class="flex items-center justify-center w-14 h-9 rounded-full">
                        <i class="fa-solid fa-eye text-white"></i>
                    </button>


                    @auth()
                        <div>
                            <a href="{{ route('profile') }}"
                                class="uppercase text-white flex items-center justify-center bg-gray-300 w-9 h-9 rounded-full">
                                <i class="fa-solid fa-user text-black"></i>
                            </a>
                        </div>
                    @else
                        <div class="">
                            <a href="{{ route('login') }}"
                                class="uppercase text-white flex items-center justify-center bg-gray-300 bg-opacity-30 w-14 h-9 rounded-full">
                                <i class="fa-solid fa-user text-white"></i>
                            </a>
                        </div>
                    @endauth

                </div>
            </div>

        </nav>


        <nav class="w-10/12 mx-auto py-10 flex lg:hidden justify-between items-center">
            <div class="logo block lg:hidden">
                <a href="{{ route('home') }}" class="font-bold text-[30px]">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="" width="80">
                </a>
            </div>

            <div class="block lg:hidden">
                <input type="checkbox" id="burger-toggle" class="hidden peer">
                <label for="burger-toggle" class="cursor-pointer text-white text-xl">
                    <i class="fa-solid fa-bars"></i>
                </label>

                <div class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex-col items-center justify-center peer-checked:flex">
                    <label for="burger-toggle" class="absolute top-5 right-5 text-white text-2xl">&times;</label>
                    <div class="flex flex-col space-y-6 text-center">
                        <a href="{{ route('home') }}" class="text-white text-lg">Басты бет</a>
                        <a href="{{ route('blog') }}" class="text-white text-lg">Блог</a>
                        <a href="{{ route('projects') }}" class="text-white text-lg">Ғылым</a>
                        <a href="{{ route('lesson') }}" class="text-white text-lg">Видео сабақтар</a>
                        <a href="{{ route('chat') }}" class="text-white text-lg">Чат бот</a>
                        <div class="relative group">
                            <a href="#" class="text-white text-lg">Спорт</a>
                            <div class="hidden group-hover:block absolute bg-white text-black py-2 px-4 space-y-2">
                                <a href="{{ route('nutrition') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Дұрыс тамақтану</a>
                            <a href="{{ route('calculator') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Калория калькуляторы</a>
                            <a href="{{ route('help') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Психологиялық көмек</a>
                            <a href="{{ route('test') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Өз-өзін тану тесті</a>
                            <a href="{{ route('exercises') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Кескінді жаттығулар</a>
                            </div>
                        </div>
                        <div class="relative group">
                            <a href="#" class="text-white text-lg">Жоба аясында</a>
                            <div class="hidden group-hover:block absolute bg-white text-black py-2 px-4 space-y-2">
                                <a href="{{ route('books.list') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Оқулықтар</a>
                                <a href="{{ route('business-trips.list') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Іс-сапарлары</a>
                                <a href="{{ route('seminars.list') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Халықаралық семинар</a>
                                <a href="{{ route('project.4') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Жобаның ғылыми нәтижелері</a>
                                <a href="{{ route('professional-development') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Біліктілікті арттыру</a>
                                <a href="{{ route('project.6') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Сертификаттар</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </nav>
    </header>


</div>
