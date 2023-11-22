@extends('layout')


@section('content')
    <x-typography.h4>
        Edit Resource
    </x-typography.h4>

    <div class="py-4">


        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('ebook.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <iconify-icon icon="ph:books"></iconify-icon>
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
                        <a href="{{ url()->current() }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Edit
                            Resource</a>
                    </div>
                </li>

            </ol>
        </nav>

    </div>

    <div class="py-4">




        <form method="post" action="{{ route('ebook.update', ['ebook' => $ebook->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="grid md:grid-cols-2 gap-x-3">
                {{-- title --}}

                <div class="mb-6 max-md:col-span-2">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resource
                        title</label>
                    <input type="title" id="title" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" name="title" value={{ $ebook->title }}>

                    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Enter resource
                        title here
                    </p>
                    @error('title')
                        <x-typography.error-form>{{ $message }}</x-typography.error-form>
                    @enderror
                </div>


                {{-- author --}}
                <div class="mb-6  max-md:col-span-2">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resource
                        Author</label>
                    <input type="title" id="title" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="John Doe, Jonatahn Doe" name="author" value="{{ $ebook->author }}">
                    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400"> use , to you can
                        add many
                        authors separtaing by comma , </p>


                    @error('author')
                        <x-typography.error-form>{{ $message }}</x-typography.error-form>
                    @enderror
                </div>

                {{-- content --}}
                <div class="col-span-2 mb-6">

                    <label for="message"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripiton</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Add description about title here" name="content">{{ $ebook->content }}</textarea>
                    @error('content')
                        <x-typography.error-form>{{ $message }}</x-typography.error-form>
                    @enderror
                </div>



                {{-- Youtube link --}}

                <div class="col-span-2 mb-6">
                    <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vide
                        Youtube link</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <iconify-icon icon="logos:youtube"></iconify-icon>
                        </span>
                        <input type="text" id="website-admin"
                            class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="https://youtu.be/q..." name="youtube_link" value="{{ $ebook->youtube_link }}">




                    </div>
                    @error('youtube_link')
                        <x-typography.error-form>{{ $message }}</x-typography.error-form>
                    @enderror
                </div>



                <div class=" max-md:col-span-2">
                    {{-- published date --}}
                    {{-- <label for="published_date"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publication Date</label> --}}
                    {{-- <div class="relative ">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date" name="published_date" value="{{ old('published_date') }}">
                        @error('published_date')
                            <x-typography.error-form>{{ $message }}</x-typography.error-form>
                        @enderror
                    </div> --}}
                    <div class="mb-6">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Published
                            Date</label>
                        <input type="date" id="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="published_date" value="{{ $ebook->published_date }}">
                        @error('published_date')
                            <x-typography.error-form>{{ $message }}</x-typography.error-form>
                        @enderror
                    </div>
                </div>

                {{-- select input --}}
                <div class=" max-md:col-span-2">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        Resource Category</label>
                    <select id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500   dark:focus:border-blue-500"
                        name="category" value={{ $ebook->category }}>

                        @foreach (App\Enums\EbookCategoryEnum::getValues() as $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <x-typography.error-form>{{ $message }}</x-typography.error-form>
                    @enderror
                </div>

                {{-- pdf file --}}

                <div class="mt-6  max-md:col-span-2">
                    <label for="pdf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Resource File</label>
                    <div class="flex items-center justify-center w-full">

                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p id="file-label" class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click
                                        to
                                        upload</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">pdf,doc,docx,ppt,pptx,xls,xlsx(MAX.
                                    100MB)
                                </p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" name="pdf"
                                onchange="updateFileName()" />
                        </label>
                    </div>
                    @error('pdf')
                        <x-typography.error-form>{{ $message }}</x-typography.error-form>
                    @enderror
                </div>

                {{-- thumbnail picture --}}

                <div class="mt-6  max-md:col-span-2">
                    <label for="thumbnail-file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Resource cover</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="thumbnail-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p id="thumbnail-label" class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click
                                        to
                                        upload</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400"> PNG, JPG or GIF (MAX. 10MB)
                                </p>
                            </div>
                            <input id="thumbnail-file" type="file" class="hidden" name="thumbnail"
                                onchange="updateThumbnial()" />
                        </label>
                    </div>

                    @error('thumbnail')
                        <x-typography.error-form>{{ $message }}</x-typography.error-form>
                    @enderror
                </div>



            </div>



            {{-- submit button --}}
            <button type="submit"
                class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

        </form>

    </div>

    <script>
        function updateFileName() {
            var fileInput = document.getElementById('dropzone-file');
            var fileLabel = document.getElementById('file-label');

            // Check if a file is selected
            if (fileInput.files.length > 0) {
                fileLabel.innerText = 'File selected: ' + fileInput.files[0].name;
            } else {
                fileLabel.innerText = 'Click to upload';
            }
        }

        function updateThumbnial() {
            var fileInput = document.getElementById('thumbnail-file');
            var fileLabel = document.getElementById('thumbnail-label');

            // Check if a file is selected
            if (fileInput.files.length > 0) {
                fileLabel.innerText = 'File selected: ' + fileInput.files[0].name;
            } else {
                fileLabel.innerText = 'Click to upload';
            }
        }
    </script>
@endsection
