@props(['item'])


<div id="popup-modal-{{ $item->id }}" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 justify-center items-center  md:inset-0 h-screen w-screen  max-h-full  bg-black/50 z-[9999] ">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal-{{ $item->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <iconify-icon icon="mi:delete" style="color: rgb(179, 101, 101);" width="50"></iconify-icon>

                <h3 class="mb-5 text-lg my-4  font-normal text-gray-500 dark:text-gray-400">Are you
                    sure you want to delete {{ $item->name }}</h3>
                <div class="flex items-center space-x-7 justify-center ">
                    <form action="{{ route('admin.destroy', ['admin' => $item->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button data-modal-hide="popup-modal-{{ $item->id }}" type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                            Yes, I'm sure
                        </button>
                    </form>
                    <button data-modal-hide="popup-modal-{{ $item->id }}" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mb-3">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
