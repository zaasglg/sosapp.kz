<div class="relative z-10 flex flex-col items-center justify-center">
    
    <h2 class="text-white text-2xl lg:text-4xl font-bold font-bebas uppercase roboto-slab">Sosapp.kz Порталына қош
        келдіңіз
    </h2>

    <p class="text-gray-200 text-md mt-4 lg:mt-10 w-11/12 lg:w-8/12 mx-auto font-thin">
        Бұқаралық спорт арқылы халықтың денсаулығын нығайту және физикалық белсенділікті арттыру мақсатында кең таралған спорттық
        іс-шараларды ұйымдастыруға болады. Ол әртүрлі жастағы және деңгейдегі адамдарды қамтиды, спортқа
        қатысуға ынталандырады. Салауатты өмір салты - дұрыс тамақтану, белсенділік, демалыс және зиянды
        әдеттерден аулақ болу арқылы денсаулықты сақтау және жақсарту жүйесі. Бұл өмір сапасын арттырып,
        ұзақ әрі белсенді өмір сүруге ықпал етеді.
    </p>


    @auth
        <a href="{{ route('profile') }}"
            class="bg-red-500 inline-block space-x-2 mt-10 py-3 w-[250px] rounded-full font-bold text-white uppercase transition hover:bg-red-600 hover:scale-105">Жеке
            <span>кабинет</span>
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    @else
        <a href="{{ route('login') }}"
            class="bg-blue-600 flex justify-center items-center space-x-5 border-b-4 border-blue-800 mt-10 py-4 w-[300px] text-sm rounded-md font-bold text-white uppercase transition hover:bg-blue-700">
            <span>Кіру / тіркелу</span>
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    @endauth
</div>