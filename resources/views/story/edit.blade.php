@extends('layout')


@section('content')
    <x-typography.h4>
        Edit News
    </x-typography.h4>


    <div class="py-4">


        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('new.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <iconify-icon icon="mingcute:announcement-line"></iconify-icon>
                        News
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
                            News</a>
                    </div>
                </li>

            </ol>
        </nav>

    </div>

    <div class="py-4">




        <form method="post" action="{{ route('new.update', ['new' => $story->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="grid md:grid-cols-2 gap-4">
                {{-- Inputs --}}
                <div>
                    {{-- title --}}
                    <div class="mb-6">
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="title" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Coming Soon" value="{{ $story->title }}" name="title">
                        @error('title')
                            <x-typography.error-form>{{ $message }}</x-typography.error-form>
                        @enderror
                    </div>


                    {{-- summary --}}


                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">News
                        Summary</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..." name="summary">{{ $story->summary }}</textarea>
                    @error('summary')
                        <x-typography.error-form>{{ $message }}</x-typography.error-form>
                    @enderror


                    {{-- date picker --}}

                    <div class="mb-6">
                        <label for="date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                        <input type="date" id="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="date_published" value="{{ $story->date_published }}">
                        @error('date_published')
                            <x-typography.error-form>{{ $message }}</x-typography.error-form>
                        @enderror
                    </div>


                    <div class="flex space-x-6 h-fit items-center mb-6">
                        <div class="flex items-center ">
                            <input @if ($story->is_top == 1) checked @endif id="default-radio-1" type="radio"
                                value="1" name="is_top"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-1"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lead
                                News</label>
                        </div>
                        <div class="flex items-center">
                            <input @if ($story->is_top == 0) checked @endif id="default-radio-2" type="radio"
                                value="0" name="is_top"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-2"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Daily
                                News</label>
                        </div>
                    </div>

                    {{-- <label class="relative inline-flex items-center cursor-pointer mb-6">
                        <input type="checkbox" class="sr-only peer" name="is_top" value="1">
                        <div
                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Mark as top</span>
                    </label> --}}

                    <label for="helper-text" class="block mb-2 txt-sm font-medium text-gray-900 dark:text-white"> Refernces
                    </label>
                    <input type="text" id="helper-text" aria-describedby="helper-text-explanation"1
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="nuitration , health" name="reference" value="{{ $story->reference }}">
                    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        enter list of referce address separted by comma(,) or space
                    </p>
                    @error('refernce')
                        <x-typography.error-form>{{ $message }}</x-typography.error-form>
                    @enderror


                </div>


                <div>
                    <div class="mb-6 w-full">

                        <label for="editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            message</label>
                        <textarea id="editor" name="content" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write the News here...">{{ $story->content }}</textarea>
                        @error('content')
                            <x-typography.error-form>{{ $message }}</x-typography.error-form>
                        @enderror
                    </div>

                    {{-- Thumbnail --}}
                    <div class="mb-6 w-fu">
                        <fieldset class="w-full space-y-1 dark:text-gray-100">
                            <label for="files" class="block text-sm font-medium">Thumbnail</label>
                            <div class="flex">
                                <input type="file" name="thumbnail" id="files"
                                    class="px-8 py-12 border-2 rounded-lg border-gray-300 border-dashed  dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                                    value="{{ $story->thubnail }}">
                            </div>
                        </fieldset>
                        @error('thumbnail')
                            <x-typography.error-form>{{ $message }}</x-typography.error-form>
                        @enderror
                    </div>


                    <label for="helper-text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Tags
                    </label>
                    <input type="text" id="helper-text" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="nuitration , health" name="tags" value="{{ $story->tags }}">
                    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        enter list of tags separted by comma(,) or space
                    </p>

                    @error('tags')
                        <x-typography.error-form>{{ $message }}</x-typography.error-form>
                    @enderror

                </div>
            </div>





            {{-- submit button --}}

            <button type="submit"
                class="text-white pt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
@endsection
