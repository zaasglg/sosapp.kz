<main>
    <div style="background-image: url('assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            <livewire:components.header />
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section class="bg-gray-50 py-24">
        <div class="w-11/12 lg:w-10/12 mx-auto">
            <h2 class="text-center text-3xl font-bebas text-gray-800 mb-8">Өз-өзін тану тесті</h2>

            <!-- Form -->
            <form wire:submit.prevent="submit" class="bg-white shadow-lg rounded-lg p-8">
                @foreach($questions as $question => $options)
                    <div class="mb-8">
                        <p class="text-lg font-semibold text-gray-700 mb-4">{{ $question }}</p>
                        <div class="grid gap-4">
                            @foreach($options as $option)
                                <label class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-blue-500 transition-all cursor-pointer">
                                    <input type="radio" x-model="answers['{{ $loop->parent->index }}']" name="answers[{{ $loop->parent->index }}]" value="{{ $option }}" class="form-radio h-5 w-5 text-blue-600">
                                    <span class="ml-3 text-gray-700">{{ $option }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors">
                    Жіберу
                </button>
            </form>
        </div>
    </section>
 
    @if($submitted)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg w-11/12 lg:w-1/2 p-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Нәтижелер:</h3>
                <ul class="space-y-2">
                    @php
                        $counts = ['A' => 0, 'B' => 0, 'C' => 0];
                        foreach ($answers as $answer) {
                            $firstLetter = substr($answer, 0, 1);
                            if (isset($counts[$firstLetter])) {
                                $counts[$firstLetter]++;
                            }
                        }
                    @endphp
                    @if($counts['A'] > $counts['B'] && $counts['A'] > $counts['C'])
                        <li class="text-gray-700">Сіз белсенді, мақсатқа ұмтылғыш, өмірге деген көзқарасы оң адамсыз. Қиындықтардан қорықпайсыз, өзіңізге сенімдісіз және өмірден барынша ләззат алуға тырысасыз.</li>
                    @elseif($counts['B'] > $counts['A'] && $counts['B'] > $counts['C'])
                        <li class="text-gray-700">Сіз сабырлы, салмақты және жақсы ойластырылған шешімдер қабылдайтын адамсыз. Достарыңыз бен отбасыңызға маңызды тірек бола аласыз.</li>
                    @else
                        <li class="text-gray-700">Сіз сезімтал және эмоционалды адамсыз. Өзіңізді түсінуге уақыт бөлгенді ұнатасыз. Кейде өзіңізге сенімділікті арттыруға күш салу қажет.</li>
                    @endif
                </ul>
                <!-- Close Button -->
                <div class="mt-6 flex justify-end">
                    <button @click="$wire.set('submitted', false)" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                        Жабу
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Список тестов -->
    <section class="bg-gray-100 py-10">
        <div class="w-11/12 lg:w-10/12 mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Қолжетімді тесттер</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($quizzes as $quiz)
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">{{ $quiz['name'] }}</h3>
                        <p class="text-gray-600 mb-4">{{ $quiz['description'] }}</p>
                        @if($quiz['image'])
                            <img src="{{ asset('storage/' . $quiz['image']) }}" alt="{{ $quiz['name'] }}" class="w-full h-40 object-cover rounded-lg mb-4">
                        @endif
                        <a href="{{ $quiz['url'] }}" target="_blank" class="text-blue-600 hover:underline">Тестке өту</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>