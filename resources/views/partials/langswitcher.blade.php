{{-- lang switch --}}
<div class="max-w-6xl mx-auto  sm:block hidden">
    <div class="flex justify-between px-3">
        <a></a>
        <div class="text-gray-300 px-12 py-1 bg-landy text-sm rounded-b flex space-x-4">
            <a href="{{ route(Route::currentRouteName(), 'en') }}" class=" @if(App::getLocale() == 'en') text-white @endif  ">English</a>
            <a href="{{ route(Route::currentRouteName(), 'id') }}" class="@if(App::getLocale() == 'id') text-white @endif">Indonesia</a>
        </div>
        </div>
    </div>
</div>
