@extends('layout')


@section('content')
    <x-typography.h4>
        Edit Annual Forum
    </x-typography.h4>


    <div class="py-4">


        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('forum.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <iconify-icon icon="mingcute:announcement-line"></iconify-icon>
                        Annual Forum
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
                            Annual Fourm</a>
                    </div>
                </li>

            </ol>
        </nav>

    </div>

    <div class="py-4">




        <form method="post" action="{{ route('forum.update', ['forum' => $forum->id]) }}" enctype="multipart/form-data">
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
                            placeholder="Coming Soon" value="{{ $forum->title }}" name="title">
                        @error('title')
                            <x-typography.error-form>{{ $message }}</x-typography.error-form>
                        @enderror
                    </div>


                    {{-- summary --}}


                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event
                        Location </label>

                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..." name="location">{{ $forum->location }}</textarea>
                    @error('location')
                        <x-typography.error-form>{{ $message }}</x-typography.error-form>
                    @enderror


                    {{-- date picker --}}

                    <div class="col-span-2  sm:col-span-1">
                        <label for="datetime" class="block text-sm font-medium text-gray-600">Event Date</label>
                        <input type="datetime-local" id="datetime" name="event_date"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                            value="{{ $forum->event_date }}">
                        @error('event_date')
                            <x-typography.error-form>{{ $message }}</x-typography.error-form>
                        @enderror
                    </div>







                </div>


                <div>
                    <div class="mb-6 w-full">

                        <label for="editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Annual
                            Forum Description
                        </label>
                        <textarea id="editor" name="content" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write the Description here...">{{ $forum->content }}</textarea>
                        @error('content')
                            <x-typography.error-form>{{ $message }}</x-typography.error-form>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="mb-6 w-fu">
                        <fieldset class="w-full space-y-1 dark:text-gray-100">
                            <label for="files" class="block text-sm font-medium">Image</label>
                            <div class="flex">
                                <input type="file" name="image" id="files"
                                    class="px-8 py-12 border-2 rounded-lg border-gray-300 border-dashed  dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                                    value="{{ $forum->picture }}">
                            </div>
                        </fieldset>
                        @error('image')
                            <x-typography.error-form>{{ $message }}</x-typography.error-form>
                        @enderror
                    </div>




                </div>
            </div>





            {{-- submit button --}}

            <button type="submit"
                class="text-white pt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
@endsection
