<main>
    <div style="background-image: url('assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section class="w-11/12 lg:w-10/12 mx-auto py-12">
        <p>
            <b>Дұрыс тамақтану</b> – бұл теңгерімді, қоректік заттарға бай тағамдар мен реттелген тамақтану режимін
            сақтау.
            Төменде дұрыс тамақтану үшін ұсынылатын режимдер мен рецепттер беріледі.
        </p>

        <h2 class="mt-10 text-2xl font-semibold uppercase">Дұрыс тамақтану режимі:</h2>

        <div class="flex flex-col mt-5">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="divide-y divide-white">
                                <tr>
                                    <td class="bg-blue-100 px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        Таңғы ас (07:00–09:00)</td>
                                    <td class="bg-red-100 px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        Кешкі ас пен таңғы ас арасындағы интервал 10–12 сағат болуы керек. <br>
                                        Тез сіңетін көмірсулар (жарма, сұлы), ақуыз (жұмыртқа, ірімшік) және пайдалы
                                        майлар (жаңғақтар) тұтыну
                                        қажет.
                                    </td>
                                </tr>

                                <tr>
                                    <td class="bg-blue-100 px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        Түскі ас (12:00–14:00)</td>
                                    <td class="bg-red-100 px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        Негізгі калория көзі: ақуыз (ет, балық), күрделі көмірсулар (күріш, қарақұмық),
                                        жасыл көкөністер.
                                    </td>
                                </tr>

                                <tr>
                                    <td class="bg-blue-100 px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        Түстен кейінгі тіскебасар (15:00–16:00)</td>
                                    <td class="bg-red-100 px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        Жеміс-жидектер, айран немесе йогурт, жаңғақтар жақсы.
                                    </td>
                                </tr>

                                <tr>
                                    <td class="bg-blue-100 px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        Кешкі ас (18:00–19:00)</td>
                                    <td class="bg-red-100 px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        Жеңіл және ақуызы көп тағамдар: балық, тауық еті, көкөніс.
                                    </td>
                                </tr>

                                <tr>
                                    <td class="bg-blue-100 px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        Ұйықтар алдында (21:00)</td>
                                    <td class="bg-red-100 px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        Аштықты басу үшін аз мөлшерде айран немесе бір стақан жылы сүт ішуге болады.
                                    </td>
                                </tr>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="hs-accordion-group mt-10">
            <div class="hs-accordion hs-accordion-active:border-gray-200 bg-white border border-transparent rounded-xl"
                id="hs-active-bordered-heading-one">
                <button
                    class="hs-accordion-toggle hs-accordion-active:text-blue-600 inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start text-gray-800 py-4 px-5 hover:text-gray-500 disabled:opacity-50 disabled:pointer-events-none uppercase"
                    aria-expanded="false" aria-controls="hs-basic-active-bordered-collapse-one">
                    Таңғы ас: Сұлы жармасы мен жемістер
                    <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                    </svg>
                </button>
                <div id="hs-basic-active-bordered-collapse-one"
                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                    role="region" aria-labelledby="hs-active-bordered-heading-one">
                    <div class="pb-5 px-5">
                        <div>
                            <span class="font-medium text-sm text-gray-500 font-mono mb-3 uppercase">Құрамы:</span>
                            <ul class="space-y-3 text-sm" x-data="{ receptions: ['50 г сұлы жармасы', '200 мл сүт (немесе өсімдік сүті)', '1 банан', '1 уыс жаңғақ', '1 уыс жаңғақ', '1 шай қасық бал'] }">
                                <template x-for="recept in receptions">
                                    <li class="flex gap-x-3">
                                        <svg class="shrink-0 size-4 mt-0.5 text-blue-600"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <span class="text-gray-800" x-text='recept'></span>
                                    </li>
                                </template>
                            </ul>
                        </div>

                        <div class="mt-10">
                            <span class="font-medium text-sm text-gray-500 font-mono mb-3 uppercase">Дайындау:</span>
                            <ul class="space-y-3 text-sm" x-data="{ receptions: ['Сұлы жармасын сүтпен бірге қайнатыңыз (5 минут)', 'Үстіне туралған банан, жаңғақ және бал қосыңыз'] }">
                                <template x-for="recept in receptions">
                                    <li class="flex gap-x-3">
                                        <svg class="shrink-0 size-4 mt-0.5 text-blue-600"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <span class="text-gray-800" x-text='recept'></span>
                                    </li>
                                </template>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="hs-accordion hs-accordion-active:border-gray-200 bg-white border border-transparent rounded-xl"
                id="hs-active-bordered-heading-two">
                <button
                    class="hs-accordion-toggle hs-accordion-active:text-blue-600 inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start text-gray-800 py-4 px-5 hover:text-gray-500 disabled:opacity-50 disabled:pointer-events-none uppercase"
                    aria-expanded="false" aria-controls="hs-basic-active-bordered-collapse-two">
                    Түскі ас: Қарақұмық және тауық еті
                    <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                    </svg>
                </button>
                <div id="hs-basic-active-bordered-collapse-two"
                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                    role="region" aria-labelledby="hs-active-bordered-heading-two">
                    <div class="pb-4 px-5">
                        <div>
                            <span class="font-medium text-sm text-gray-500 font-mono mb-3 uppercase">Құрамы</span>
                            <ul class="space-y-3 text-sm" x-data="{
                                receptions: [
                                    '150 г қайнатылған тауық төс еті',
                                    '100 г қарақұмық жармасы',
                                    '1 уыс брокколи',
                                    'Лимон шырыны, зәйтүн майы'
                                ]
                            }">
                                <template x-for="recept in receptions">
                                    <li class="flex gap-x-3">
                                        <svg class="shrink-0 size-4 mt-0.5 text-blue-600"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <span class="text-gray-800" x-text='recept'></span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                        <div class="mt-10">
                            <span class="font-medium text-sm text-gray-500 font-mono mb-3 uppercase">Дайындау</span>
                            <ul class="space-y-3 text-sm" x-data="{
                                receptions: [
                                    'Қарақұмықты тұзсыз қайнатыңыз',
                                    'Тауық етін бумен немесе қайнатып пісіріңіз',
                                    'Брокколиді бумен дайындап, зәйтүн майы мен лимон шырынын себіңіз'
                                ]
                            }">
                                <template x-for="recept in receptions">
                                    <li class="flex gap-x-3">
                                        <svg class="shrink-0 size-4 mt-0.5 text-blue-600"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <span class="text-gray-800" x-text='recept'></span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hs-accordion hs-accordion-active:border-gray-200 bg-white border border-transparent rounded-xl"
                id="hs-active-bordered-heading-three">
                <button
                    class="hs-accordion-toggle hs-accordion-active:text-blue-600 inline-flex justify-between items-center gap-x-3 w-full font-semibold text-start text-gray-800 py-4 px-5 hover:text-gray-500 disabled:opacity-50 disabled:pointer-events-none uppercase"
                    aria-expanded="false" aria-controls="hs-basic-active-bordered-collapse-three">
                    Кешкі ас: Балық пен көкөніс салаты
                    <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                    </svg>
                </button>
                <div id="hs-basic-active-bordered-collapse-three"
                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                    role="region" aria-labelledby="hs-active-bordered-heading-three">
                    <div class="pb-4 px-5">
                        <div>
                            <span class="font-medium text-sm text-gray-500 font-mono mb-3 uppercase">Құрамы:</span>
                            <ul class="space-y-3 text-sm" x-data="{ receptions: ['200 г лосось немесе треска', '1 қияр', '1 қызанақ', 'Салат жапырақтары', '1 шай қасық зәйтүн майы'] }">
                                <template x-for="recept in receptions">
                                    <li class="flex gap-x-3">
                                        <svg class="shrink-0 size-4 mt-0.5 text-blue-600"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <span class="text-gray-800" x-text='recept'></span>
                                    </li>
                                </template>
                            </ul>
                        </div>

                        <div class="mt-10">
                            <span class="font-medium text-sm text-gray-500 font-mono mb-3 uppercase">Дайындау:</span>
                            <ul class="space-y-3 text-sm" x-data="{
                                receptions: [
                                    'Балықты пеште пісіріңіз',
                                    'Салат жапырақтарын жуып, көкөністерді тураңыз',
                                    'Балықты көкөніс салатымен бірге жеңіз'
                                ]
                            }">
                                <template x-for="recept in receptions">
                                    <li class="flex gap-x-3">
                                        <svg class="shrink-0 size-4 mt-0.5 text-blue-600"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <span class="text-gray-800" x-text='recept'></span>
                                    </li>
                                </template>
                            </ul>
                        </div>

                        <div class="mt-10">
                            <span class="font-medium text-sm text-gray-500 font-mono mb-3 uppercase">Қосымша
                                кеңестер:</span>
                            <ul class="space-y-3 text-sm" x-data="{
                                receptions: [
                                    'Күніне 1,5–2 литр су ішіңіз',
                                    'Қантты тағамдарды және газдалған сусындарды шектеңіз',
                                    'Тамақтануды уақытылы орындауға тырысыңыз',
                                    'Тамақ мөлшерін бақылаңыз (үлкен порциялардан аулақ болыңыз)'
                                ]
                            }">
                                <template x-for="recept in receptions">
                                    <li class="flex gap-x-3">
                                        <svg class="shrink-0 size-4 mt-0.5 text-blue-600"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <span class="text-gray-800" x-text='recept'></span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>
