@extends('layouts.app')

@section('content')
    <div style="background-image: url('assets/images/main-bg.jpg')" class="bg-center bg-cover relative">
        <div class="relative z-10">
            @include('layouts.header')
        </div>
        <div class="bg-black absolute top-0 left-0 w-full h-full bg-opacity-75"></div>
    </div>

    <section class="bg-gray-50">


        <div class="w-10/12 mx-auto py-24">
            <h2 class="text-center text-3xl font-bebas">Галерея</h2>
            <div class="flex items-center justify-center mt-10">
                <span>Ештеңке табылмады</span>
            </div>
        </div>

    </section>

    @include('layouts.footer')
@endsection
