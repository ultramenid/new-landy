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
            <a class="text-3xl font-semibold capitalize">{{__('downloads') }}</a>
            <div class="grid grid-flow-row sm:grid-cols-3 grid-cols-1 grid-rows-3 gap-4 mt-12">

                <div class="flex flex-col text-center  space-y-4 bg-landy-2 rounded-lg  w-full px-4 py-2">
                    <img src="{{ asset('assets/downloads/1697985831.png') }}" alt="" class="mx-auto h-24 object-cover ">
                    <a href="{{ route('landsatmosaics', [app()->getLocale()]) }}" class="font-semibold" > {{__('landsat mosaics') }} </a>
                </div>

                <div class="flex flex-col text-center  space-y-4 bg-landy-2 rounded-lg  w-full px-4 py-2">
                    <img src="{{ asset('assets/downloads/1697973204.jpeg') }}" alt="" class="mx-auto h-24 object-cover ">
                    <a href="{{ route('collectionmap', [app()->getLocale()]) }}" class=" font-semibold" >{{__('map collection') }} </a>
                </div>

                <div class="flex flex-col text-center  space-y-4 bg-landy-2 rounded-lg  w-full px-4 py-2">
                    <img src="{{ asset('assets/downloads/1697970122.png') }}" alt="" class="mx-auto h-24 object-cover ">
                    <a href="{{ route('statistics', [app()->getLocale()]) }}" class=" font-semibold" > {{__('statistics') }}</a>
                </div>

                <div class="flex flex-col text-center  space-y-4 bg-landy-2 rounded-lg  w-full px-4 py-2">
                    <img src="{{ asset('assets/downloads/1697970480.png') }}" alt="" class="mx-auto h-24 object-cover ">
                    <a href="{{ route('legendcode', [app()->getLocale()]) }}" class=" font-semibold" >{{__('legend code') }} </a>
                </div>

                <div class="flex flex-col text-center  space-y-4 bg-landy-2 rounded-lg  w-full px-4 py-2">
                    <img src="{{ asset('assets/downloads/1697971718.jpeg') }}" alt="" class="mx-auto h-24 object-cover ">
                    <a href="{{ route('infographics', [app()->getLocale()]) }}" class=" font-semibold" >{{__('infographics') }}</a>
                </div>

                <div class="flex flex-col text-center  space-y-4 bg-landy-2 rounded-lg  w-full px-4 py-2">
                    <img src="{{ asset('assets/downloads/1697971629.jpeg') }}" alt="" class="mx-auto h-24 object-cover ">
                    <a href="{{ route('murals', [app()->getLocale()]) }}" class=" font-semibold" >{{__('mural maps') }}</a>
                </div>
		    </div>
        </div>
    </div>


    @include('partials.footer')
@endsection
