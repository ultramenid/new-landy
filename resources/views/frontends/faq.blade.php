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

    <div class="sm:px-0 px-4" x-data="{ open: '' }">
        <div class="max-w-3xl mx-auto bg-white relative  -mt-20 z-20 rounded sm:px-6 px-4 sm:py-12 py-4 border-b border-landy min-h-[40vh]">
            <h1 class="text-3xl font-bold mb-6">FAQ</h1>

            <?php  foreach($data as $item) : ?>
                <template x-if="open!=='{{$item->id}}'">
                    <div class="<?php if($item->id == 1){ echo 'border-t border-b ';}else{ echo'border-b'; } ?>  cursor-pointer  py-4 px-4 border-landy"

                        x-data="{ icon:false}"
                        @click="open  = '{{$item->id}}'"
                        @mouseover="icon=true"
                        @mouseover.away="icon=false"
                        :class="{ 'bg-landy-2' : open === '{{$item->id}}' }"
                        >
                        <div class="flex justify-between space-x-10">
                            <a class="text-black" >
                            {{$item->question}}
                            </a>
                            <svg x-show="icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <div x-show="open==='{{$item->id}}'" class="mt-2">
                            <div  class="mt-6 prose max-w-none text-sm px-4 leading-relaxed break-words">
                                {!! $item->answer !!}
                            </div>
                        </div>
                    </div>
                </template>
                <template x-if="open==='{{$item->id}}'">
                    <div class="<?php if($item->id == 1){ echo 'border-t border-b';}else{ echo'border-b'; } ?>   py-4 px-4  border-landy"
                        x-data="{ icon:false}"

                        @mouseover="icon=true"
                        @mouseover.away="icon=false"
                        :class="{ 'bg-landy-2' : open === '{{$item->id}}' }"
                        >
                        <div class="flex justify-between space-x-10">
                            <a class=" text-black font-semibold cursor-pointer" @click="open = ''">
                                {!! $item->question !!}
                            </a>
                            <svg x-show="icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <div x-show="open==='{{$item->id}}'" class="mt-2">
                            <div  class="mt-6 prose max-w-none text-sm leading-relaxed break-words" >
                                {!! $item->answer !!}
                            </div>
                        </div>
                    </div>
                </template>

            <?php endforeach ?>
        </div>
    </div>


    @include('partials.footer')
@endsection
