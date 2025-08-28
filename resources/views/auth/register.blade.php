@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-white flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <a href="{{ route('home') }}">
                        <img class="h-24 w-auto" src="{{ asset('assets/images/logo.png') }}" alt="Workflow">
                    </a>
                    <h2 class="mt-6 text-xl font-extrabold font-bebas text-gray-900">
                        Тіркелу
                    </h2>

                </div>

                <div class="mt-8">

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="mt-6">
                        <form action="{{ route('register') }}" method="POST" class="space-y-4">
                            @csrf

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">
                                    Пошта
                                </label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" autocomplete="email" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Аты
                                </label>
                                <div class="mt-1">
                                    <input id="name" name="name" type="text" autocomplete="name" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="surname" class="block text-sm font-medium text-gray-700">
                                    Тегі
                                </label>
                                <div class="mt-1">
                                    <input id="surname" name="surname" type="text" autocomplete="surname" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="birthday" class="block text-sm font-medium text-gray-700">
                                    Туылған күні
                                </label>
                                <div class="mt-1">
                                    <input id="birthday" name="birthday" type="date" autocomplete="birthday" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">
                                    Байланыс телефоны
                                </label>
                                <div class="mt-1">
                                    <input id="phone" name="phone" type="text" autocomplete="phone" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">
                                    Мекен жайы
                                </label>
                                <div class="mt-1">
                                    <input id="address" name="address" type="text" autocomplete="address"
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="gender" class="block text-sm font-medium text-gray-700">
                                    Жынысы
                                </label>
                                <div class="mt-1">
                                    <select id="gender" name="gender" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected disabled>Жынысы</option>
                                        <option value="male">Ер</option>
                                        <option value="female">Әйел</option>
                                    </select>
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-gray-700">
                                    Құпиясөз
                                </label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" autocomplete="current-password"
                                        required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>


                            <div>
                                <button type="submit"
                                    class="w-full mt-10 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    Тіркелу
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-2">
                            <a href="{{ route('login') }}" class="text-sm font-thin">Жеке кабинетке кіру</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('assets/images/login-bg.jpg') }}"
                alt="">
        </div>
    </div>
@endsection
