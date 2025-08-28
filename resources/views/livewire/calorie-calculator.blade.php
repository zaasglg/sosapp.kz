<main>
    <div style="background-image: url('assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section class="w-11/12 lg:w-10/12 mx-auto py-12">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center uppercase">Калория есептегіш</h1>

        <form wire:submit.prevent="calculate" class="space-y-6">

            <div class="grid grid-cols-2 gap-5">

                <div>
                    <label for="input-age" class="block text-sm font-medium mb-2">Жасыңыз</label>
                    <input type="text" id="input-age" wire:model="age"
                        class="py-3 border px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        required>
                </div>

                <div>
                    <label for="input-weight" class="block text-sm font-medium mb-2">Салмағыңыз (кг)</label>
                    <input type="text" id="input-weight" wire:model="weight"
                        class="py-3 border px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        required>
                </div>

                <div>
                    <label for="input-height" class="block text-sm font-medium mb-2">Бойыңыз (см)</label>
                    <input type="text" id="input-height" wire:model="height"
                        class="py-3 border px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        required>
                </div>


                <div>
                    <label for="select-gender" class="block text-sm font-medium mb-2">Жынысыңыз</label>
                    <select id="select-gender" wire:model="gender"
                        class="py-3 border px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none appearance-none"
                        required>
                        <option value="">Жынысыңызды таңдаңыз</option>
                        <option value="male">Ер</option>
                        <option value="female">Әйел</option>
                    </select>
                </div>

                <div>
                    <label for="select-activity" class="block text-sm font-medium mb-2">Жынысыңыз</label>
                    <select id="select-activity" wire:model="activity"
                        class="py-3 border px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none appearance-none"
                        required>
                        <option value="">Белсенділік деңгейін таңдаңыз</option>
                        <option value="1.2">Минималды</option>
                        <option value="1.375">Жеңіл</option>
                        <option value="1.55">Орташа</option>
                        <option value="1.725">Жоғары</option>
                        <option value="1.9">Өте жоғары</option>
                    </select>
                </div>
            </div>

            <button type="submit"
                class="bg-sky-500 px-10 text-white font-medium py-3 rounded-lg hover:bg-sky-700 focus:outline-none focus:ring focus:ring-indigo-300">
                Есептеу
            </button>
        </form>

        @if ($calories)
            <div class="mt-8 p-6 bg-gray-100 border border-gray-300 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Нәтижелер</h2>

                <div class="text-gray-700 space-y-2">
                    <p><strong>Күнделікті калория мөлшері:</strong> {{ $calories }} ккал</p>
                    <p><strong>Ақуыздар:</strong> {{ $protein }} г</p>
                    <p><strong>Майлар:</strong> {{ $fat }} г</p>
                    <p><strong>Көмірсулар:</strong> {{ $carbs }} г</p>
                    <p><strong>Тиімді салмақ:</strong> {{ $effective_weight }} кг</p>
                    <p><strong>Дене массасының индексі (ДМИ):</strong> {{ $bmi }}</p>
                </div>
            </div>
        @endif
    </section>
</main>
