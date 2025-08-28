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

                <div class="relative inline-block text-left group">
                    <button type="button"
                        class="inline-flex items-center gap-x-2 uppercase text-white font-bold text-sm rounded-md">
                        Ғылым
                        <i class="fa-solid fa-caret-down"></i>
                    </button>

                    <div class="absolute left-0 w-60 bg-white shadow-md rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200" style="z-index: 999999;">
                        <div class="p-1 space-y-1">
                            <a href="{{ route('projects') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Ғылыми жобалар</a>
                            <a href="{{ route('project.4') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Жобаның ғылыми нәтижелері</a>
                        </div>
                    </div>
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

                    <div class="absolute left-0 w-60 bg-white shadow-md rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200" style="z-index: 999999;">
                        <div class="p-1 space-y-1">
                            <a href="{{ route('books.list') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Оқулықтар</a>
                            <a href="{{ route('business-trips.list') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Іс-сапарлары</a>
                            <a href="{{ route('seminars.list') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Халықаралық семинар</a>
                            <a href="{{ route('professional-development') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Біліктілікті арттыру</a>
                            <a href="{{ route('project.6') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Сертификаттар</a>
                            <a href="{{ route('sport-events') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Спорттық іс-шаралар</a>
                            <a href="{{ route('project-members') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Жоба мүшелері</a>
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
                    <button wire:click="toggleBlackWhite"
                        class="flex items-center justify-center {{ $isBlackWhite ? 'bg-blue-500' : 'bg-gray-300 bg-opacity-30' }} w-14 h-9 rounded-full">
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

        <nav class="flex lg:hidden w-10/12 mx-auto py-10 justify-between items-center">
            <div class="logo">
                <a href="{{ route('home') }}" class="font-bold text-[30px]">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="" width="80">
                </a>
            </div>

            <div class="block lg:hidden">
                <input type="checkbox" id="burger-toggle" class="hidden peer">
                <label for="burger-toggle" class="cursor-pointer text-white rounded flex items-center justify-center">
                    <i class="fa-solid fa-bars text-3xl"></i>
                </label>

                <div class="fixed inset-0 bg-gradient-to-br from-white to-blue-50 hidden peer-checked:flex flex-col items-center justify-start overflow-y-auto pt-20 pb-10 shadow-2xl" style="z-index: 999999;">
                    <label for="burger-toggle" class="absolute top-5 right-5 text-gray-800 text-xl">
                        <i class="fa-solid fa-times text-red-500 text-3xl"></i>
                    </label>
                    
                    <!-- Logo in menu -->
                    <div class="w-24 h-24 flex items-center justify-center mb-8">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-20 h-20 object-contain">
                    </div>
                    
                    <div class="flex flex-col w-full px-8 space-y-2">
                        <!-- Main Links -->
                        <a href="{{ route('home') }}" class="flex items-center py-3.5 px-6 text-gray-800 text-base rounded-xl border border-blue-100 hover:bg-blue-100/50 hover:border-blue-200 transition-all duration-300 {{ Request::is('/') ? 'bg-blue-100 text-blue-700 font-medium border-blue-300 shadow-sm' : '' }}">
                            <i class="fa-solid fa-home mr-4 w-5 text-center text-blue-600"></i>
                            <span>Басты бет</span>
                        </a>
                        <a href="{{ route('blog') }}" class="flex items-center py-3.5 px-6 text-gray-800 text-base rounded-xl border border-blue-100 hover:bg-blue-100/50 hover:border-blue-200 transition-all duration-300 {{ Request::is('blog') ? 'bg-blue-100 text-blue-700 font-medium border-blue-300 shadow-sm' : '' }}">
                            <i class="fa-solid fa-newspaper mr-4 w-5 text-center text-blue-600"></i>
                            <span>Блог</span>
                        </a>
                        
                        <!-- Ғылым dropdown -->
                        <details class="group mb-2">
                            <summary class="flex items-center py-3.5 px-6 text-gray-800 text-base rounded-xl border border-blue-100 hover:bg-blue-100/50 hover:border-blue-200 transition-all duration-300 cursor-pointer list-none">
                                <i class="fa-solid fa-flask mr-4 w-5 text-center text-blue-600"></i>
                                <span>Ғылым</span>
                                <i class="fa-solid fa-chevron-down ml-auto transform group-open:rotate-180 transition-transform text-blue-400"></i>
                            </summary>
                            <div class="bg-white mt-2 rounded-xl border border-blue-100 overflow-hidden shadow-sm">
                                <a href="{{ route('projects') }}" class="flex items-center py-3.5 px-6 text-gray-700 text-base border-b border-blue-50 hover:bg-blue-50 transition-all duration-300">
                                    <i class="fa-solid fa-project-diagram mr-3 text-blue-500"></i> Ғылыми жобалар
                                </a>
                                <a href="{{ route('project.4') }}" class="flex items-center py-3.5 px-6 text-gray-700 text-base hover:bg-blue-50 transition-all duration-300">
                                    <i class="fa-solid fa-chart-line mr-3 text-blue-500"></i> Жобаның ғылыми нәтижелері
                                </a>
                            </div>
                        </details>
                        
                        <a href="{{ route('lesson') }}" class="flex items-center py-3.5 px-6 text-gray-800 text-base rounded-xl border border-blue-100 hover:bg-blue-100/50 hover:border-blue-200 transition-all duration-300 {{ Request::is('video') ? 'bg-blue-100 text-blue-700 font-medium border-blue-300 shadow-sm' : '' }}">
                            <i class="fa-solid fa-video mr-4 w-5 text-center text-blue-600"></i>
                            <span>Видео сабақтар</span>
                        </a>
                        <a href="{{ route('chat') }}" class="flex items-center py-3.5 px-6 text-gray-800 text-base rounded-xl border border-blue-100 hover:bg-blue-100/50 hover:border-blue-200 transition-all duration-300 {{ Request::is('chat') ? 'bg-blue-100 text-blue-700 font-medium border-blue-300 shadow-sm' : '' }}">
                            <i class="fa-solid fa-robot mr-4 w-5 text-center text-blue-600"></i>
                            <span>Чат бот</span>
                        </a>
                        
                        <!-- Спорт dropdown -->
                        <details class="group mb-2">
                            <summary class="flex items-center py-3.5 px-6 text-gray-800 text-base rounded-xl border border-blue-100 hover:bg-blue-100/50 hover:border-blue-200 transition-all duration-300 cursor-pointer list-none">
                                <i class="fa-solid fa-dumbbell mr-4 w-5 text-center text-blue-600"></i>
                                <span>Спорт</span>
                                <i class="fa-solid fa-chevron-down ml-auto transform group-open:rotate-180 transition-transform text-blue-400"></i>
                            </summary>
                            <div class="bg-white mt-2 rounded-xl border border-blue-100 overflow-hidden shadow-sm">
                                <a href="{{ route('nutrition') }}" class="flex items-center py-3.5 px-6 text-gray-700 text-base border-b border-blue-50 hover:bg-blue-50 transition-all duration-300">
                                    <i class="fa-solid fa-utensils mr-3 text-blue-500"></i> Дұрыс тамақтану
                                </a>
                                <a href="{{ route('calculator') }}" class="flex items-center py-3.5 px-6 text-gray-700 text-base border-b border-blue-50 hover:bg-blue-50 transition-all duration-300">
                                    <i class="fa-solid fa-calculator mr-3 text-blue-500"></i> Калория калькуляторы
                                </a>
                                <a href="{{ route('help') }}" class="flex items-center py-3.5 px-6 text-gray-700 text-base border-b border-blue-50 hover:bg-blue-50 transition-all duration-300">
                                    <i class="fa-solid fa-hand-holding-heart mr-3 text-blue-500"></i> Психологиялық көмек
                                </a>
                                <a href="{{ route('test') }}" class="flex items-center py-3.5 px-6 text-gray-700 text-base border-b border-blue-50 hover:bg-blue-50 transition-all duration-300">
                                    <i class="fa-solid fa-clipboard-list mr-3 text-blue-500"></i> Өз-өзін тану тесті
                                </a>
                                <a href="{{ route('exercises') }}" class="flex items-center py-3.5 px-6 text-gray-700 text-base hover:bg-blue-50 transition-all duration-300">
                                    <i class="fa-solid fa-running mr-3 text-blue-500"></i> Кескінді жаттығулар
                                </a>
                            </div>
                        </details>
                        
                        <!-- Жоба аясында dropdown -->
                        <details class="group mb-2">
                            <summary class="flex items-center py-3.5 px-6 text-gray-800 text-base rounded-xl border border-blue-100 hover:bg-blue-100/50 hover:border-blue-200 transition-all duration-300 cursor-pointer list-none">
                                <i class="fa-solid fa-project-diagram mr-4 w-5 text-center text-blue-600"></i>
                                <span>Жоба аясында</span>
                                <i class="fa-solid fa-chevron-down ml-auto transform group-open:rotate-180 transition-transform text-blue-400"></i>
                            </summary>
                            <div class="bg-white mt-2 rounded-xl border border-blue-100 overflow-hidden shadow-sm">
                                <a href="{{ route('books.list') }}" class="flex items-center py-3.5 px-6 text-gray-700 text-base border-b border-blue-50 hover:bg-blue-50 transition-all duration-300">
                                    <i class="fa-solid fa-book mr-3 text-blue-500"></i> Оқулықтар
                                </a>
                                <a href="{{ route('business-trips.list') }}" class="flex items-center py-3.5 px-6 text-gray-700 text-base border-b border-blue-50 hover:bg-blue-50 transition-all duration-300">
                                    <i class="fa-solid fa-plane mr-3 text-blue-500"></i> Іс-сапарлары
                                </a>
                                <a href="{{ route('seminars.list') }}" class="flex items-center py-3.5 px-6 text-gray-700 text-base border-b border-blue-50 hover:bg-blue-50 transition-all duration-300">
                                    <i class="fa-solid fa-chalkboard-teacher mr-3 text-blue-500"></i> Халықаралық семинар
                                </a>
                                <a href="{{ route('professional-development') }}" class="flex items-center py-3.5 px-6 text-gray-700 text-base border-b border-blue-50 hover:bg-blue-50 transition-all duration-300">
                                    <i class="fa-solid fa-graduation-cap mr-3 text-blue-500"></i> Біліктілікті арттыру
                                </a>
                                <a href="{{ route('project.6') }}" class="flex items-center py-3.5 px-6 text-gray-700 text-base border-b border-blue-50 hover:bg-blue-50 transition-all duration-300">
                                    <i class="fa-solid fa-certificate mr-3 text-blue-500"></i> Сертификаттар
                                </a>
                                <a href="{{ route('sport-events') }}" class="flex items-center py-3.5 px-6 text-gray-700 text-base border-b border-blue-50 hover:bg-blue-50 transition-all duration-300">
                                    <i class="fa-solid fa-trophy mr-3 text-blue-500"></i> Спорттық іс-шаралар
                                </a>
                                <a href="{{ route('project-members') }}" class="flex items-center py-3.5 px-6 text-gray-700 text-base hover:bg-blue-50 transition-all duration-300">
                                    <i class="fa-solid fa-users mr-3 text-blue-500"></i> Жоба мүшелері
                                </a>
                            </div>
                        </details>
                        
                        <!-- Auth buttons -->
                        <div class="pt-8 mt-4 border-t border-blue-100 flex justify-center">
                            @auth
                                <a href="{{ route('profile') }}" class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-7 rounded-xl transition-all duration-300 hover:shadow-lg hover:from-blue-600 hover:to-blue-700">
                                    <i class="fa-solid fa-user-circle"></i> Профиль
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-7 rounded-xl transition-all duration-300 hover:shadow-lg hover:from-blue-600 hover:to-blue-700 mr-3">
                                    <i class="fa-solid fa-sign-in-alt"></i> Кіру
                                </a>
                                <a href="{{ route('register') }}" class="flex items-center gap-2 bg-white border-2 border-blue-400 text-blue-600 py-3 px-7 rounded-xl transition-all duration-300 hover:bg-blue-50 hover:shadow-md">
                                    <i class="fa-solid fa-user-plus"></i> Тіркелу
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

        </nav>
    </header>


</div>
