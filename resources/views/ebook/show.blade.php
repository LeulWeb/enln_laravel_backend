@extends('layout')

@section('content')
    @php
        function getYoutubeVideoId($url)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
                return $match[1];
            } else {
                return false;
            }
        }

    @endphp


    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('ebook.index') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <iconify-icon icon="ic:outline-upcoming"></iconify-icon>

                    Resources
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
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Resource
                        Detail</a>
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


                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 grid md:grid-cols-2 gap-4">
                    {{-- First Column  --}}
                    <section>
                        {{-- image thumbnail --}}
                        <div class="max-h-[60vh] mb-6 w-full overflow-hidden">
                            <img src="{{ asset($ebook->thumbnail) }}" class=" bg-cover" alt="">
                        </div>
                        <div>

                            @if ($ebook->pdf)
                                <a href="{{ route('ebook.download', ['ebook' => $ebook->id]) }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-6 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 my-4 flex items-center h-fit w-fit">
                                    <iconify-icon icon="material-symbols:download" width="22"></iconify-icon>
                                    <span>download</span></a>
                            @else
                                <div>
                                    <p class="text-gray-500 dark:text-white text-xl font-semibold">File resource is
                                        undefined
                                    </p>
                                </div>
                            @endif


                        </div>
                        <x-typography.h4 class="my-4">
                            {{ $ebook->title }}
                        </x-typography.h4>
                        <div>
                            <p class="text-black dark:text-white mt-6 ">
                                {{ $ebook->content }}
                            </p>
                        </div>
                    </section>

                    {{-- second column --}}
                    <section>



                        {{--  youtube link --}}
                        @if ($ebook->youtube_link)
                            <div>
                                <div class="mb-6">
                                    <iconify-icon icon="logos:youtube"></iconify-icon>

                                </div>

                                @php
                                    $videoId = getYoutubeVideoId($ebook->youtube_link);
                                    $thumbnailUrl = "https://img.youtube.com/vi/$videoId/maxresdefault.jpg";

                                @endphp
                                <a href="{{ $ebook->youtube_link }}" target="_blank">
                                    <div class="relative bg-cover bg-center"
                                        style="background-image: url({{ $thumbnailUrl }})">
                                        <div class="h-[40vh] bg-black/60 w-full flex items-center justify-center">
                                            <div>
                                                <iconify-icon icon="openmoji:youtube" width="44"></iconify-icon>
                                                <p class="text-white ">
                                                    Play Video
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>


                            </div>
                        @else
                            <div>
                                <p class="text-gray-500 dark:text-white text-xl font-semibold">Video resource is undefined
                                </p>
                            </div>
                        @endif

                        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                        <div class="w-full grid grid-cols-1 gap-y-3">
                            {{--  author --}}
                            @if ($ebook->author)
                                <div>

                                    <p class="mb-3 text-gray-500 dark:text-gray-400"> <strong
                                            class="font-semibold text-gray-900 dark:text-white">Authors: </strong></p>

                                    @php
                                        $authorList = explode(',', $ebook->author);
                                    @endphp

                                    @foreach ($authorList as $author)
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $author }}</span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-black dark:text-white">Author is undefined</p>
                            @endif


                            {{--  category  --}}

                            <div>

                                <p class="mb-3 text-gray-500 dark:text-gray-400"> <strong
                                        class="font-semibold text-gray-900 dark:text-white">Resource type: </strong></p>



                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $ebook->category }}</span>

                            </div>

                            <div class="w-full flex items-center space-x-3 justify-end dark:text-white">
                                <iconify-icon icon="uiw:date"></iconify-icon>
                                <span>{{ Carbon\Carbon::parse($ebook->published_date)->format('M d, Y') }}</span>
                            </div>

                        </div>

                    </section>





                </div>
                <!-- Modal footer -->
                <div class="flex space-x-4 items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <a href={{ route('ebook.edit', ['ebook' => $ebook->id]) }}
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
                                        sure you want to delete {{ $ebook->title }}?</h3>
                                    <form action={{ route('ebook.destroy', ['ebook' => $ebook->id]) }} method="POST">
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
