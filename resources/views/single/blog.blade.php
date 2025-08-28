@extends('layouts.app')

@section('content')
    <div style="background-image: url('/assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            @include('layouts.header')
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <div class="w-11/12 lg:w-10/12 mx-auto">

        <main class="my-10">

            <div class="mb-4 md:mb-0 w-full relative" style="height: 24em;">
                <div class="absolute left-0 bottom-0 w-full h-full z-10"
                    style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                <img src="{{ asset('/storage/' . $post->hero) }}"
                    class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
                <div class="p-4 absolute bottom-0 left-0 z-20">
                    <h2 class="text-3xl font-semibold text-gray-100 leading-tight font-bebas">
                        {{ $post->title }}
                    </h2>
                </div>
            </div>

            <div class="mt-12 text-gray-700 text-base leading-relaxed proose">
                {!! $post->description !!}
            </div>
        </main>
        <!-- main ends here -->

    </div>

    @include('layouts.footer')
@endsection
