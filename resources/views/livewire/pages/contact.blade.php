<main>
    <div style="background-image: url('assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section class="w-11/12 lg:w-10/12 mx-auto">

        <div class="relative py-24 bg-white w-full">
            <div class="mt-8 overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 items-start">
                    <div class="p-6 mr-2 bg-gray-50 sm:rounded-lg">
                        <h1 class="text-3xl text-gray-800 font-bold font-bebas">
                            КЕҢЕС АЛУ
                        </h1>

                        <div class="flex items-center mt-8 text-gray-600">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                Түркістан қаласы
                            </div>
                        </div>

                        <div class="flex items-center mt-4 text-gray-600 ">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                +7 777 777 7777
                            </div>
                        </div>

                        <div class="flex items-center mt-2 text-gray-600">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                info@sosapp.kz
                            </div>
                        </div>

                        <div class="flex space-x-4 mt-10">
                            <a href="#">
                                <i class="fa-brands fa-instagram text-2xl"></i>
                            </a>

                            <a href="#">
                                <i class="fa-brands fa-facebook text-2xl"></i>
                            </a>

                            <a href="#">
                                <i class="fa-brands fa-whatsapp text-2xl"></i>
                            </a>
                        </div>
                    </div>

                    <form class="p-6 flex flex-col justify-center">
                        <div>
                            <label for="input-name" class="block text-sm font-medium mb-2">Толық аты-жөні</label>
                            <input type="text" id="input-name"
                                class="border py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="">
                        </div>

                        <div class="mt-3">
                            <label for="input-email" class="block text-sm font-medium mb-2">Email</label>
                            <input type="email" id="input-email"
                                class="border py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="example@mail.ru">
                        </div>

                        <div class="mt-3">
                            <label for="input-phone" class="block text-sm font-medium mb-2">Телефон нөмірі</label>
                            <input type="text" id="input-phone"
                                class="border py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="+7 (777) 777 7777">
                        </div>

                        <div class="mt-3">
                            <label for="input-phone" class="block text-sm font-medium mb-2">Қауымдастық форумдары,
                                тематикалық көмек алу </label>
                            <select type="text" id="input-phone"
                                class="appearance-none border py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="+7 (777) 777 7777">
                                <option value="Психологиялық жағдайы">
                                    Психологиялық жағдайы
                                </option>
                                <option value="Дене жағдайына байланысты">
                                    Дене жағдайына байланысты
                                </option>
                                <option value="Қоршаған ортамен байланыс">
                                    Қоршаған ортамен байланыс
                                </option>
                                <option value="Тамақтану режимі">
                                    Тамақтану режимі
                                </option>
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="input-phone" class="block text-sm font-medium mb-2">Сұрақты толықтыру</label>
                            <textarea rows="5" type="text" id="input-phone"
                                class="border py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="+7 (777) 777 7777"></textarea>
                        </div>


                        <div class="mt-3">
                            <button type="submit"
                                class="md:w-32 bg-red-600 hover:bg-blue-dark text-white text-sm py-3 px-6 rounded-lg mt-3 hover:bg-red-800 transition ease-in-out duration-300">
                                Жіберу
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</main>
