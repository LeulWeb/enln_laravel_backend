@props(['upcomingEvent'])

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen bg-black/80 dark:bg-white/80 max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $upcomingEvent->title }}
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">

                <p class="text-base leading-relaxed text-gray-800 dark:text-gray-400">
                    {{ $upcomingEvent->content }}
                </p>
                @if ($upcomingEvent->location)
                    <div class="text-base flex flex-col justify-start leading-relaxed text-gray-800 dark:text-gray-400">
                        <div class="flex items-center w-full space-x-3">
                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                Location
                            </p>
                            <iconify-icon icon="ion:location-outline"></iconify-icon>
                        </div>
                        {{ $upcomingEvent->location }}
                    </div>
                @endif
                <div class="flex w-full justify-between items-center">
                    {{--  --}}

                    @if ($upcomingEvent->start_date)
                        <div
                            class="text-base flex flex-col justify-start leading-relaxed text-gray-800 dark:text-gray-400">
                            <div class="flex items-center w-full space-x-3">
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Start Date
                                </p>
                                <iconify-icon icon="formkit:datetime"></iconify-icon>
                            </div>
                            {{ Carbon\Carbon::parse($upcomingEvent->start_date)->format('M d,y, H:i:a') }}
                        </div>
                    @endif

                    {{--  --}}

                    @if ($upcomingEvent->end_date)
                        <div
                            class="text-base flex flex-col justify-start leading-relaxed text-gray-800 dark:text-gray-400">
                            <div class="flex items-center w-full space-x-3">
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    End Date
                                </p>
                                <iconify-icon icon="formkit:datetime"></iconify-icon>
                            </div>
                            {{ Carbon\Carbon::parse($upcomingEvent->end_date)->format('M d,y, H:i:a') }}
                        </div>
                    @endif
                    {{--  --}}
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <a href="{{ route('upcoming.edit', ['upcoming' => $upcomingEvent->id]) }}"
                    data-modal-hide="default-modal" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Edit</a>
                {{-- <a href="{{ route('upcoming.destroy', ['upcoming', $upcomingEvent->id]) }}"
                    data-modal-hide="default-modal" type="button"
                    class="ms-3 text-red-500 bg-white hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-red-700 dark:text-white dark:border-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Delete</a> --}}
            </div>
        </div>
    </div>
</div>
