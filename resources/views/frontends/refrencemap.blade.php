@extends('layouts.indexLayout')

@section('meta')
    @include('partials.indexMeta')
@endsection

@section('content')


    @include('partials.navMobile')
    <div class="bg-white sticky top-0 z-50">
        @include('partials.navPC')
    </div>
    <div class="border-b-[0.4px] border-red-500"></div>

    {{-- heroPage --}}

    <div class="">
        <img src="{{ asset('assets/hero-fire.png') }}" alt="MapBiomas Indonesia - Landy" class=" mt-2 z-10 sm:h-[45vh] h-[30vh] w-full object-top object-cover">
    </div>

    <div class="sm:px-0 px-4">
        <div class="max-w-3xl mx-auto bg-white relative  -mt-20 z-20 rounded sm:px-6 px-4 sm:py-12 py-4 border-b border-red-600 min-h-[40vh]">
            <iframe src="https://flo.uri.sh/visualisation/15997818/embed" frameborder="0" width="100%" height="600px"></iframe>
            <iframe src="https://flo.uri.sh/visualisation/15998156/embed" frameborder="0" width="100%" height="600px"></iframe>
            <iframe src="https://flo.uri.sh/visualisation/15998921/embed" frameborder="0" width="100%" height="600px"></iframe>
            <iframe src="https://flo.uri.sh/visualisation/15998992/embed" frameborder="0" width="100%" height="600px"></iframe>
            <iframe src="https://flo.uri.sh/visualisation/18980331/embed" frameborder="0" width="100%" height="600px"></iframe>
        </div>
    </div>


    @include('partials.footer')
@endsection
