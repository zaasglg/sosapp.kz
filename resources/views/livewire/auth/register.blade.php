<div>
    <div style="background-image: url('assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section>
        <div class="py-24">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-600">Тіркелу</h2>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-2xl bg-gray-50 rounded-xl">
                <div class="px-4 py-8 sm:px-10">

                    @session('register_status')
                        <span class="block mb-3 text-green-500 font-semibold">{{ session('register_status') }}</span>
                    @endsession

                    <form class="space-y-6" wire:submit.prevent='register()' method="POST">

                        <div class="grid grid-cols-2 gap-5">
                            {{-- Name --}}
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700"> Есімі </label>
                                <div class="mt-1">
                                    <input id="name" name="name" type="text" wire:model='form.name'
                                        class="block w-full px-5 py-3 text-base text-gray-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-white focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" />
                                </div>

                                @error('form.name')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>


                            {{-- Surname --}}
                            <div>
                                <label for="surname" class="block text-sm font-medium text-gray-700"> Тегі </label>
                                <div class="mt-1">
                                    <input id="surname" name="surname" type="text" wire:model='form.surname'
                                        class="block w-full px-5 py-3 text-base text-gray-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-white focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" />
                                </div>

                                @error('form.surname')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="grid grid-cols-2 gap-5">
                            {{-- Birthday --}}
                            <div>
                                <label for="birthday" class="block text-sm font-medium text-gray-700"> Туылған
                                    күн</label>
                                <div class="mt-1">
                                    <input id="birthday" name="birthday" type="date" wire:model='form.birthday'
                                        class="appearance-none block w-full px-5 py-3 text-base text-gray-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-white focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" />
                                </div>

                                @error('form.birthday')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Phone --}}
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700"> Телефон номер
                                </label>
                                <div class="mt-1">
                                    <input id="phone" name="phone" type="text" wire:model='form.phone'
                                        class="block w-full px-5 py-3 text-base text-gray-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-white focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" />
                                </div>

                                @error('form.phone')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            {{-- Address --}}
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700"> Мекен-жай
                                </label>
                                <div class="mt-1">
                                    <input id="address" name="address" type="text" wire:model='form.address'
                                        class="block w-full px-5 py-3 text-base text-gray-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-white focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" />
                                </div>

                                @error('form.address')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>


                            {{-- Gender --}}
                            <div>
                                <label for="gender" class="block text-sm font-medium text-gray-700"> Жынысы </label>
                                <div class="mt-1">
                                    <select id="gender" name="gender" type="text" wire:model='form.gender'
                                        class="appearance-none block w-full px-5 py-3 text-base text-gray-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-white focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">

                                        <option selected disabled>Пусто</option>
                                        <option value="female">Әйел</option>
                                        <option value="male">Еркек</option>

                                    </select>
                                </div>

                                @error('form.gender')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-5">

                            {{-- Weight --}}
                            <div>
                                <label for="weight" class="block text-sm font-medium text-gray-700"> Салмағы </label>
                                <div class="mt-1">
                                    <input id="weight" name="weight" type="text" wire:model='form.weight'
                                        class="appearance-none block w-full px-5 py-3 text-base text-gray-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-white focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" />
                                </div>

                                @error('form.weight')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- height --}}
                            <div>
                                <label for="height" class="block text-sm font-medium text-gray-700"> Бойы
                                </label>
                                <div class="mt-1">
                                    <input id="height" name="height" type="text" wire:model='form.height'
                                        class="block w-full px-5 py-3 text-base text-gray-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-white focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" />
                                </div>

                                @error('form.height')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" wire:model='form.email'
                                        class="block w-full px-5 py-3 text-base text-gray-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-white focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" />
                                </div>

                                @error('form.email')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700"> Құпиясөз
                                </label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" wire:model='form.password'
                                        class="block w-full px-5 py-3 text-base text-gray-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-white shadow-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" />
                                </div>

                                @error('form.password')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div>
                            <button type="submit"
                                class="flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Тіркелу
                            </button>

                            <a href="{{ route('login') }}" class="text-center block mt-3">Кіру</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
