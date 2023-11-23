@extends('layout')

@section('content')
    <div class="flex   justify-between py-4">
        <x-typography.h4>
            <a href="{{ url()->current() }}">Annual Forum</a>
        </x-typography.h4>


        {{-- create button --}}
        <a href='{{ route('forum.create') }}' type="button"
            class="text-white flex items-center space-x-3  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <iconify-icon icon="ic:outline-upcoming" width="22"></iconify-icon>
            <span>Add Forum</span>
        </a>
    </div>


    @if (count($forumList) == 0)
        <x-no-data>
            <a href='{{ route('forum.create') }}' type="button"
                class="text-white flex items-center space-x-3  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <iconify-icon icon="ic:outline-upcoming" width="22"></iconify-icon>
                <span>Add Forum</span>
            </a>
        </x-no-data>
    @else
        {{-- table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between pb-4">

                <form action="{{ route('forum.index') }}">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items" name="keyword">
                    </div>
                </form>
            </div>


            {{-- table --}}
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Forum Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($forumList as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="px-6 py-4">
                                <img src="{{ asset($item->image) }}" class="w-40" alt="" srcset="">
                            </td>

                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ Carbon\Carbon::parse($item->event_date)->format('M d,y') }}
                            </td>

                            <td class="px-6 py-4">


                                <div class="flex items-center h-full space-x-4">
                                    <a href="{{ route('forum.show', ['forum' => $item->id]) }}"
                                        data-modal-target="default-modal" data-modal-toggle="default-modal"
                                        class="font-medium text-blue-600 dark:text-blue-500
                                hover:underline">View</a>


                                    <button data-modal-target="popup-modal-{{ $item->id }}"
                                        data-modal-toggle="popup-modal-{{ $item->id }}" class="block" type="button">
                                        <iconify-icon icon="mi:delete" style="color: red;" width="24"></iconify-icon>
                                    </button>

                                    <x-delete-annual-forum :item="$item"></x-delete-annual-forum>

                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-4">
                {{ $forumList->links('vendor.pagination.tailwind') }}
            </div>




        </div>
    @endif

@endsection
