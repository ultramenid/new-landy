 <!-- collaboration -->
        <div class="mt-12  border-t border-gray-300 max-w-6xl mx-auto px-4 py-4">
            <div class="flex sm:flex-row flex-col items-center overflow overflow-auto sm:gap-32 gap-4">
                <div class="w-full sm:w-10/12 ">
                    <h1>Co-creators</h1>
                    <div class="flex justify-between w-full flex-wrap">
                        <a href="https://auriga.or.id/" target="_blank" >
                            <img class="h-10 mt-2" src="{{ asset('assets/logos/AurigaPNG.png') }}" alt="">
                        </a>
                        <a href="https://www.jeratpapua.org/" target="_blank" >
                            <img src="{{ asset('assets/logos/logo2_color.png') }}" alt="" class="h-12 ">
                        </a>
                        <a href="https://saveourborneo.org/" target="_blank" >
                            <img src="{{ asset('assets/logos/logo3_color.png') }}" alt="" class="h-12">
                        </a>
                        <a href="http://greenofborneo.id/" target="_blank" >
                            <img src="{{ asset('assets/logos/logo4_color.png') }}" alt="" class="h-12">
                        </a>
                        <a href="https://www.haka.or.id/" target="_blank" >
                            <img src="{{ asset('assets/logos/logo5-x.png') }}" alt="" class="h-12">
                        </a>
                        <a href="http://mnukwarpapua.id/" target="_blank" >
                            <img src="{{ asset('assets/logos/logo6-x.png') }}" alt="" class="h-12">
                        </a>
                        <a href="https://hutaninstitute.or.id/" target="_blank" >
                            <img src="{{ asset('assets/logos/logo7-x.png') }}" alt="" class="h-12">
                        </a>
                        <a href="http://yayasangenesisbengkulu.or.id/" target="_blank" >
                            <img src="{{ asset('assets/logos/logo8-x.png') }}" alt="" class="h-12">
                        </a>
                         <a href="https://komiu.id/" target="_blank" >
                            <img src="{{ asset('assets/logos/logo9-x.png') }}"  alt="" class="h-12">
                        </a>
                        <a href="http://sampankalimantan.id/" target="_blank" >
                            <img src="{{ asset('assets/logos/logo10-x.png') }}" alt="" class="h-12">
                        </a>

                    </div>
                </div>


                <div class="sm:w-2/12 w-full">
                    <h1 class="">Supported by</h1>
                    <a href="https://woods-wayside.org/" target="_blank" class="">
                        <img src="{{ asset('assets/logos/logo12-x.png') }}" alt="" class="h-12">
                    </a>
                </div>


            </div>
        </div>

    </div>

 <!-- footer -->
 <div class="bg-gray-500 border-t-4 border-landy mt-20 ">
    <div class="flex sm:flex-row flex-col gap-8  py-4 mt-4 max-w-6xl mx-auto px-4">
        <div class="flex flex-col">
            <a href="{{ route('about', app()->getlocale() )}}" class="text-white font-bold">{{__('about') }}</a>

        </div>
        <div class="flex flex-col">
            <a href="{{ route('faq', app()->getlocale() )}}" class="text-white font-bold">FAQ</a>
        </div>

        <div class="flex flex-col">
            <a class="text-white font-bold">{{__('map & data') }}</a>
            <a href="{{ route('termsofuse', app()->getlocale() )}}" class=" text-white text-sm font-light mt-2">{{__('terms of use') }}</a>
            <a href="https://platform.indonesia.mapbiomas.org/fogo" class="text-white text-sm font-light">{{__('platform/map') }}</a>
            <a href="{{ route('statistics', app()->getlocale() )}}" class="text-white text-sm font-light">{{__('statistics') }}</a>
            <a href="{{ route('accuracy-assessment', app()->getlocale() )}}" class="text-white text-sm font-light">{{__('accuracy assessment') }}</a>
            <a href="{{ route('infographics', app()->getlocale() )}}" class="text-white text-sm font-light">{{__('infographics') }}</a>
        </div>

        <div class="flex flex-col">
            <a class="text-white font-bold">methodology</a>
            <a href="{{ route('atbd', app()->getlocale() )}}" class="text-white text-sm font-light mt-2">ATBD</a>
            <a href="{{ route('refmap', app()->getlocale() )}}" class="text-white text-sm font-light">{{__('references map') }}</a>
            <a href="{{ route('gee', app()->getlocale() )}}" class="text-white text-sm font-light">google earth engine</a>
            <a href="{{ route('glossary', app()->getlocale() )}}" class="text-white text-sm font-light">{{__('glossary') }}</a>
        </div>

        <div class="flex flex-col">
            <a href="{{ route('newsnevent', app()->getlocale() )}}" class="text-white font-bold">{{__('news & event') }}</a>
        </div>

        {{-- <div class="flex flex-col">
            <a href="{{ route('downloads', app()->getlocale() )}}"  class="font-bold text-white">{{__('downloads') }}</a>
        </div> --}}

         <div class="flex flex-col">
            <a class="text-white font-bold">downloads</a>
            <a href="{{ route('landsatmosaics', app()->getlocale() )}}" class="text-white text-sm font-light mt-2">{{__('landsat mosaics') }}</a>
            <a href="{{ route('collectionmap', app()->getlocale() )}}" class="text-white text-sm font-light">{{__('map collection') }}</a>
            <a href="{{ route('infographics', app()->getlocale() )}}" class="text-white text-sm font-light">{{__('infographics') }}</a>
            <a href="{{ route('legendcode', app()->getlocale() )}}" class="text-white text-sm font-light">{{__('legend code') }}</a>
            <a href="{{ route('murals', app()->getlocale() )}}" class="text-white text-sm font-light">{{__('mural maps') }}</a>
        </div>

    </div>


 </div>
