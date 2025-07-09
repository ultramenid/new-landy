<div>
    @foreach ($data as $item)
        <div class="mt-4 flex flex-col gap-2">
            <a href="{{ asset('storage/files/photos/'.$item->img) }}"><img src="{{ asset('storage/files/photos/'.$item->img) }}" alt="{{$item->title}}" class="w-full h-full mt-4"></a>
            <a href="{{ asset('storage/files/photos/'.$item->img) }}" class="text-landy text-xl font-semibold ">{{$item->title}}</a>
        </div>
    @endforeach{{-- Close your eyes. Count to one. That is how long forever feels. --}}
    @if ($data)
    {{ $data->links('livewire.pagination') }}
    @endif
</div>
