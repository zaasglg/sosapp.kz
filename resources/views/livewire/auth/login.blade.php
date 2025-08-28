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
            <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-600">Жеке кабинетке кіру</h2>
          </div>
      
          <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md bg-gray-50 rounded-xl">
            <div class="px-4 py-8 sm:px-10">

              @session('login_status')
                <span class="block mb-3 text-red-500 font-semibold">{{ session('login_status') }}</span>
              @endsession

              <form class="space-y-6" wire:submit.prevent='login()' method="POST">
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
                  <label for="password" class="block text-sm font-medium text-gray-700"> Құпиясөз </label>
                  <div class="mt-1">
                    <input id="password" name="password" type="password" wire:model='form.password'
                      class="block w-full px-5 py-3 text-base text-gray-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-white shadow-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300" />
                  </div>

                  @error('form.password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                  @enderror
                </div>
    
      
                <div>
                  <button type="submit"
                    class="flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Кіру
                  </button>

                  <a href="{{ route('register') }}" class="text-center block mt-3">Тіркелу</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

</div>
