@extends('layout')

@section('content')
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="/forum"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <iconify-icon icon="ic:outline-upcoming"></iconify-icon>

                    Annual Forums
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href={{ url()->current() }}
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                        Forum Detail</a>
                </div>
            </li>

        </ol>
    </nav>
    <div class="  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full  max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 text-black dark:text-white">
                <!-- Modal header -->
                <div class="p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <div class="max-h-[60vh] w-full overflow-hidden">
                        <img src="{{ asset($forum->image) }}" class=" bg-cover" alt="">
                    </div>

                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <x-typography.h4>
                        {{ $forum->title }}
                    </x-typography.h4>


                    {{-- * content --}}



                    <div>
                        <p class="text-black dark:text-white ">
                            {!! $forum->content !!}
                        </p>
                    </div>

                    {{-- location if exists  --}}

                    @if ($forum->location)
                        <div class="text-base flex flex-col justify-start leading-relaxed text-gray-800 dark:text-gray-400">
                            <div class="flex items-center w-full space-x-3">
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Location
                                </p>
                                <iconify-icon icon="ion:location-outline"></iconify-icon>
                            </div>
                            {{ $forum->location }}
                        </div>
                    @endif


                    <div class="w-full flex items-center space-x-3 justify-end dark:text-white">
                        <iconify-icon icon="uiw:date"></iconify-icon>
                        <span>{{ Carbon\Carbon::parse($forum->event_date)->format('M d, Y H:i') }}</span>
                    </div>



                </div>
                <!-- Modal footer -->
                <div class="flex space-x-4 items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <a href={{ route('forum.edit', ['forum' => $forum->id]) }}
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>

                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                        class="font-medium text-red-600 dark:text-red-500
                    hover:underline"
                        type="button">
                        Delete
                    </button>

                    <div id="popup-modal" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="popup-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you
                                        sure you want to delete {{ $forum->title }}?</h3>
                                    <form action={{ route('forum.destroy', ['forum' => $forum->id]) }} method="POST">
                                        @csrf
                                        @method('delete')
                                        <button data-modal-hide="popup-modal" type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                            Yes, I'm sure
                                        </button>
                                        <button data-modal-hide="popup-modal" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                            cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
