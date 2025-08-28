<main>
    <div style="background-image: url('assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            @include('layouts.header')
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section>
        <div class="w-11/12 lg:w-10/12 mx-auto py-12">
            <div class="flex flex-col justify-center items-center">
                <div class="relative flex flex-col items-center w-full">
                    <div class="w-full flex items-center space-x-5">
                        <div>
                            <div
                                class="w-[150px] h-[150px] bg-cyan-50 flex items-center justify-center rounded-lg cursor-pointer">
                                <i class="fa-solid fa-camera text-gray-700 text-2xl"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-navy-700">
                                {{ auth()->user()->surname ?? "" }} {{ auth()->user()->name }}
                            </h4>
                            <span class="text-gray-400 text-sm">Қолданушы</span>

                            {{-- <a href="#" class="uppercase flex justify-center border border-gray-100 items-center space-x-2 mt-5 transition duration-200 hover:bg-gray-100 py-3 px-2 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-sky-500">
                                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                </svg>
                                  
                                <span class="text-xs font-bold text-sky-500">
                                    Редакторлау
                                </span>
                            </a> --}}
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 w-full mt-10 bg-gray-50 rounded-lg">
                        <div
                            class="flex flex-col items-center justify-center  lg:border-r p-5 transition hover:bg-gray-100 cursor-pointer">
                            <span
                                class="text-xs text-white bg-red-500 bg-opacity-70 px-1 rounded font-thin inline-block">Байланыс
                                номері</span>
                            <span class="text-base font-medium text-navy-700 mt-2">
                                {{ auth()->user()->phone }}
                            </span>
                        </div>

                        <div
                            class="flex flex-col items-center justify-center lg:border-r p-5 transition hover:bg-gray-100 cursor-pointer">
                            <span
                                class="text-xs text-white bg-red-500 bg-opacity-70 px-1 rounded font-thin inline-block">Туылған
                                күні</span>
                            <span class="text-base font-medium text-navy-700 mt-2">
                                {{ auth()->user()->birthday }}
                            </span>
                        </div>

                        <div
                            class="flex flex-col items-center justify-center p-5 transition hover:bg-gray-100 cursor-pointer">
                            <span class="text-xs text-white bg-red-500 bg-opacity-70 px-1 rounded font-thin inline-block">
                                Жынысы</span>
                            <span class="text-base font-medium text-navy-700 mt-2">
                                {{ auth()->user()->gender == 'male' ? 'Еркек' : 'Әйел' }}
                            </span>
                        </div>

                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 w-full mt-10 bg-gray-50 rounded-lg">
                        <div
                            class="flex flex-col items-center justify-center  lg:border-r p-5 transition hover:bg-gray-100 cursor-pointer">
                            <span class="text-xs text-white bg-red-500 bg-opacity-70 px-1 rounded font-thin inline-block">
                                Салмағы
                            </span>
                            <span class="text-base font-medium text-navy-700 mt-2">
                                {{ auth()->user()->weight ?? 0 }} Кг
                            </span>
                        </div>

                        <div
                            class="flex flex-col items-center justify-center lg:border-r p-5 transition hover:bg-gray-100 cursor-pointer">
                            <span class="text-xs text-white bg-red-500 bg-opacity-70 px-1 rounded font-thin inline-block">
                                Бойы</span>
                            <span class="text-base font-medium text-navy-700 mt-2">
                                {{ auth()->user()->height ?? 0 }} Cm
                            </span>
                        </div>

                        <div
                            class="flex flex-col items-center justify-center p-5 transition hover:bg-gray-100 cursor-pointer">

                            @php
                                use Carbon\Carbon;
                                $birthDate = auth()->user()->birthday ?? '2000-05-15';
                                $age = Carbon::parse($birthDate)->age;
                            @endphp
                            <span class="text-xs text-white bg-red-500 bg-opacity-70 px-1 rounded font-thin inline-block">
                                Жасы</span>
                            <span class="text-base font-medium text-navy-700 mt-2">
                                {{ $age }}    
                            </span>
                        </div>

                    </div>

                    <div class="mt-10 w-full">
                        <h2 class="uppercase font-bold">Тапсырған тесттер тарихы</h2>



                        <div class="mt-5 space-y-3">
                            @forelse (auth()->user()->answers as $answer)
                                <div class="border rounded-sm py-2 px-2 flex items-center space-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-red-500">
                                        <path fill-rule="evenodd" d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z" clip-rule="evenodd" />
                                      </svg>
                                      
                                    <div class="flex flex-col">
                                        <span class="text-base">{{ $answer->answer }}</span>
                                        <span class="text-xs text-gray-400">
                                            {{ $answer->created_at }}
                                        </span>

                                    </div>
                                </div>
                            @empty
                                <span class="text-center block text-gray-400 font-thin text-sm lowercase mt-10">
                                    Ештеңке табылмады
                                </span>
                            @endforelse
                        </div>

                    </div>


                    <div class="mt-10">
                        <a href="{{ route('auth.logout') }}" class="text-sm text-red-500">
                            Аккаунттан шығу
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>