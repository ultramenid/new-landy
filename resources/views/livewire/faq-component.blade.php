<div class="px-2">
    <div x-data="{ open: @entangle('deleter') }">
        @include('partials.deleterModal')
    </div>
    {{-- <livewire:toastr /> --}}

    <div class="flex justify-between mb-6">
        <h1 class="sm:text-3xl text-xl text-newgray-900 dark:text-newgray-300 font-semibold ">FAQ</h1>


        <a href="{{ url('/cms/addfaq') }}" class="inline-flex  px-4  py-1 rounded dark:hover:bg-newgray-900 dark:hover:border-gray-200 dark:hover:text-gray-200 hover:bg-white hover:text-newgray-900 border hover:border-newgray-900 bg-newgray-900 dark:bg-gray-100 text-newgray-100 dark:text-newgray-900">
                New
        </a>


    </div>

    <div class="text-left lg:w-1/4 w-full">
        <label class="text-gray-600 dark:text-gray-300 mr-2 text-sm" >Search </label>
        <input placeholder="" type="text" class="bg-gray-100 dark:bg-newgray-700 text-newgray-700 dark:text-gray-300 rounded w-full border  py-3 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 text-sm"  wire:model.live.debounce.300ms="query">
    </div>
    <div class="flex flex-col py-5">
        <div class="-my-2  sm:-mx-6 lg:-mx-8 ">
            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8 ">
                <div class="shadow  border-b border-gray-200 dark:border-gray-800 sm:rounded-lg dark:bg-opacity-10  dark:text-white " >
                <table class="w-full divide-y divide-gray-200 dark:divide-gray-800 rounded-lg  ">
                    <thead >
                        <tr >
                            <th  class="px-6 py-4 bg-gray-50 dark:bg-opacity-10  dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer sm:w-4/12 w-11/12">
                               <div class="flex space-x-1">
                                   <a>Question ID</a>

                                </div>
                            </th>
                            <th class="px-4 py-3 bg-gray-50 dark:bg-opacity-10  dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider  sm:w-2/12 w-0">
                                <a class="hidden sm:block">Question EN</a>
                            </th>

                            <th class=" text-right bg-gray-50 dark:bg-opacity-10  dark:text-white text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">

                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-opacity-20 dark:text-white divide-y divide-gray-200 dark:divide-gray-900">
                        @forelse ($posts as $item)
                        <tr>
                            <td class="px-6 py-4 break-words text-sm  text-newgray-700 dark:text-gray-300">
                                <a>{{ $item->questionID }}</a>
                            </td>
                            <td class="px-6 py-4 break-words text-sm  text-newgray-700 dark:text-gray-300">
                                <a>{{ $item->questionEN }}</a>
                            </td>

                            <td colspan="2" class=" break-words text-sm text-gray-500 dark:text-gray-300 px-6">
                                <div class="relative flex justify-end" x-data="{ open: false }">

                                    <button class=" focus:outline-none" @click="open = true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                        </svg>
                                    </button>

                                    <ul
                                        class="absolute mt-6  right-0 bg-white rounded-lg shadow-lg block w-24 z-10"
                                        x-show.transition="open"
                                        @click.away="open = false"
                                        x-cloak style="display: none !important">

                                        <a  href="{{ url('/cms/editfaq/'.$item->id) }}"><li class="block hover:bg-gray-200 cursor-pointer py-1 mt-2 px-4 dark:text-gray-500" @click.away="open = false">Edit</li></a>

                                        <li class="block hover:bg-gray-200 cursor-pointer  py-1 mb-2 px-4 dark:text-gray-500"  wire:click="delete({{ $item->id }})" @click.away="open = false">Delete</li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="whitespace-nowrap text-sm text-gray-500 px-6 py-3">
                                No data found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if ($posts)
    {{ $posts->links('livewire.pagination') }}
    @endif
</div>
