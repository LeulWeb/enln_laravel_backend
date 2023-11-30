@extends('layout')

@section('content')
<div class="flex    justify-between py-4">
    <x-typography.h4>
        News Later Subscribers
    </x-typography.h4>


    {{-- create button --}}

    <form action="{{ route('subscriber.store') }}" method="post">
        @csrf
        <div class="my-2">

            <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Name" name="name">
            @error('name')
            <x-typography.error-form>{{ $message }}</x-typography.error-form>
            @enderror
        </div>

        <label for="subsciber" class="mb-2 text-sm  bg-blue-500 font-medium text-gray-900 sr-only dark:text-white">Add
            Subscriber</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <iconify-icon icon="line-md:email"></iconify-icon>
            </div>
            <input type="email" id="subsciber" class="block w-96 p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="youremail@gmail.com" required name="email">
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Subscribe</button>
        </div>

        @error('email')
        <x-typography.error-form>{{ $message }}</x-typography.error-form>
        @enderror
    </form>

</div>




@if (count($subscriberList) == 0)
<x-no-data>


    <form action="{{ route('subscriber.store') }}" method="post">
        @csrf
        <div class="my-2">

            <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Name" name="name">
            @error('name')
            <x-typography.error-form>{{ $message }}</x-typography.error-form>
            @enderror
        </div>

        <label for="subsciber" class="mb-2 text-sm  bg-blue-500 font-medium text-gray-900 sr-only dark:text-white">Add
            Subscriber</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <iconify-icon icon="line-md:email"></iconify-icon>
            </div>
            <input type="email" id="subsciber" class="block w-96 p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="youremail@gmail.com" required name="email">
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Subscribe</button>
        </div>

        @error('email')
        <x-typography.error-form>{{ $message }}</x-typography.error-form>
        @enderror
    </form>
</x-no-data>
@else
<div class="relative
                        overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex items-center justify-between pb-4">

        {{-- search form --}}
        <form action="{{ route('subscriber.index') }}">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="search" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items" name="keyword">
            </div>
        </form>
    </div>


    {{-- table --}}
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                <th scope="col" class="px-6 py-3">
                    status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>

            </tr>
        </thead>
        <tbody>

            @foreach ($subscriberList as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $item->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $item->email }}
                </td>
                <td class="px-6 py-4">
                    {{-- @if ($item->subscribed)
                                    <iconify-icon icon="material-symbols:notifications-active-outline-sharp"
                                        style="color: green;" width="24"></iconify-icon>
                                @else
                                    <iconify-icon icon="mdi:bell-off-outline" style="color: red;"
                                        width="24"></iconify-icon>
                                @endif --}}


                    <form method="post" id="update-status-form" action="{{ route('subscriber.update', ['subscriber' => $item->id]) }}">
                        @csrf
                        @method('put')


                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="subscribed" onchange="submitForm()">
                            <option value="0" @selected($item->subscribed)>Muted</option>
                            <option value="1" @selected($item->subscribed)>Active</option>
                        </select>

                    </form>



                    <script>
                        function submitForm() {
                            document.getElementById('update-status-form').submit();
                        }
                    </script>

                </td>
                <td class="px-6
                                    py-4 flex items-center space-x-3">






                    {{-- <button data-modal-target="popup-modal-{{ $item->id }}" data-modal-toggle="popup-modal"
                    class="font-medium text-red-600 dark:text-red-500
                    hover:underline"
                    type="button">
                    <iconify-icon icon="mi:delete" style="color: red;" width="24"></iconify-icon>
                    </button> --}}


                    <button data-modal-target="popup-modal-{{ $item->id }}" data-modal-toggle="popup-modal-{{ $item->id }}" class="block" type="button">
                        <iconify-icon icon="mi:delete" style="color: red;" width="24"></iconify-icon>
                    </button>






                    <x-modal :item="$item" />


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <div class="px-4">
        {{ $subscriberList->links('vendor.pagination.tailwind') }}
    </div>




</div>
@endif



@endsection