@extends('layouts.indexLayout')

@section('meta')
    @include('partials.indexMeta')
@endsection

@section('content')

    @include('partials.navMobile')
    <div class="bg-white sticky top-0 z-50">
        @include('partials.navPC')
    </div>
    <div class="border-b-[0.4px] border-landy"></div>

    {{-- heroPage --}}

    <div class="">
        <img src="{{ asset('assets/landy-hero.jpeg') }}" alt="Mapbiomas Indonesia - Fire" class=" mt-2 z-10 sm:h-[45vh] h-[30vh] w-full object-top object-cover">
    </div>

    <div class="sm:px-0 px-4">
        <div class="max-w-3xl mx-auto bg-white relative  -mt-20 z-20 rounded sm:px-6 px-4 sm:py-12 py-4 border-b border-landy min-h-[40vh]">
            <a class="text-3xl font-semibold capitalize">{{__('about') }}</a>
            <div class="prose max-w-none mt-4 sm:text-base text-sm leading-relaxed font-light">
                {!! optional($data)->content !!}
            </div>
        </div>
    </div>


    @include('partials.footer')
@endsection
