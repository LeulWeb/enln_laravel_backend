@extends('layout')

@section('content')
    <x-typography.h4>
        Upcoming Evetnts
    </x-typography.h4>


    <div class="py-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('upcoming.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <iconify-icon icon="material-symbols:event-upcoming-outline"></iconify-icon>

                        Upcoming Events
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
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Add
                            Upcoming Event</a>
                    </div>
                </li>

            </ol>
        </nav>
    </div>




    <form method="POST" action="{{ route('upcoming.store') }}" class="py-4">
        @csrf
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Upcoming Event" value="{{ old('title') }}">
                @error('title')
                    <x-typography.error-form>{{ $message }}</x-typography.error-form>
                @enderror
            </div>

            {{-- content --}}
            <div class="col-span-2 ">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event
                    Description</label>
                <textarea id="description" rows="2"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write event description here" name="content">{{ old('content') }}</textarea>
                @error('content')
                    <x-typography.error-form>{{ $message }}</x-typography.error-form>
                @enderror
            </div>


            {{-- Date formats --}}
            <div class="col-span-2  sm:col-span-1">
                <label for="datetime" class="block text-sm font-medium text-gray-600">Start Date</label>
                <input type="datetime-local" id="datetime" name="start_date"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    value="{{ old('start_date') }}">
                @error('start_date')
                    <x-typography.error-form>{{ $message }}</x-typography.error-form>
                @enderror
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="enddate" class="block text-sm font-medium text-gray-600">End Date</label>
                <input type="datetime-local" id="enddate" name="end_date"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    value="{{ old('end_date') }}">
                @error('end_date')
                    <x-typography.error-form>{{ $message }}</x-typography.error-form>
                @enderror
            </div>
            {{-- Location form --}}
            <div class="col-span-2">
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event
                    Location</label>
                <textarea id="location" rows="2"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write location of event here" name="location">{{ old('location') }}</textarea>
                @error('location')
                    <x-typography.error-form>{{ $message }}</x-typography.error-form>
                @enderror
            </div>
        </div>
        <button type="submit"
            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            Upcoming Event
        </button>
    </form>
@endsection
