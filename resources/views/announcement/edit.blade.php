@extends('layout')


@section('content')
    <x-typography.h4>
        Edit Announcement
    </x-typography.h4>







    <div class="py-4">


        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/announcements"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <iconify-icon icon="mingcute:announcement-line"></iconify-icon>
                        Announcement
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="/announcements/create"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Edit
                            Announcement</a>
                    </div>
                </li>

            </ol>
        </nav>

    </div>

    <div class="py-4">


        <form method="post" action="{{"/announcements/".$announcement->id}}" class="w-5/12">
            @csrf
            @method('put')
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="title" id="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Coming Soon" value={{ $announcement->title }} name="title">
                @error('title')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="title"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Announcement</label>
                <textarea name="body" id="editor" cols="30" rows="10">{{ $announcement->body }}</textarea>
                @error('body')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>


            {{-- date picker --}}

            <div class="mb-6">
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                <input type="date" id="date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="date" value={{ $announcement->date }}">
                @error('date')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                <input type="time" id="time"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="time" value={{ $announcement->time }}">
                @error('time')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>




            {{-- submit button --}}

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
@endsection
