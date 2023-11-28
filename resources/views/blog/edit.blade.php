@extends('layout')


@section('content')
    <x-typography.h4>
        Edit Blog
    </x-typography.h4>


    <div class="py-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('blog.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <iconify-icon icon="mingcute:announcement-line"></iconify-icon>
                        Blogs
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
                            Blog</a>
                    </div>
                </li>

            </ol>
        </nav>

    </div>

    <div class="py-4">




        <form method="post" action="{{ route('blog.update', ['blog' => $blog->id]) }}" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
                {{-- Inputs --}}
                <div>
                    {{-- title --}}
                    <div class="mb-6">
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Coming Soon" value="{{ $blog->title }}" name="title">
                        @error('title')
                            <x-typography.error-form>{{ $message }}</x-typography.error-form>
                        @enderror
                    </div>


                    <label for="helper-text" class="block mb-2 txt-sm font-medium text-gray-900 dark:text-white"> Tags
                    </label>
                    <input type="text" id="helper-text" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="nuitration , health" name="tags" value="{{ $blog->tags }}">
                    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        enter list of referce address separted by comma(,)
                    </p>
                    @error('tags')
                        <x-typography.error-form>{{ $message }}</x-typography.error-form>
                    @enderror


                    {{-- Thumbnail --}}
                    <div class="my-6 w-fu">
                        <fieldset class="w-full space-y-1 dark:text-gray-100">
                            <label for="files" class="block text-sm font-medium">Thumbnail</label>
                            <div class="flex">
                                <input type="file" name="thumbnail" id="files"
                                    class="px-8 py-12 border-2 rounded-lg border-gray-300 border-dashed  dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                            </div>
                        </fieldset>
                        @error('thumbnail')
                            <x-typography.error-form>{{ $message }}</x-typography.error-form>
                        @enderror
                    </div>


                    {{-- authors --}}
                    <div>
                        <label for="helper-text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Authors
                        </label>
                        <input type="text" id="helper-text" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Jhon Doe , Jonatan" name="author" value="{{ $blog->author }}">
                        <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            enter list of authors separted by comma(,)
                        </p>

                        @error('author')
                            <x-typography.error-form>{{ $message }}</x-typography.error-form>
                        @enderror
                    </div>


                </div>


                <div>
                    <div>
                        <div class="mb-6 w-full ">
                            <label for="tinymce"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                            <textarea class="form-control" name="content" id="tinymce">{{ $blog->content }}</textarea>
                            @error('content')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>






                </div>
            </div>





            {{-- submit button --}}

            <button type="submit"
                class="text-white pt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
@endsection
