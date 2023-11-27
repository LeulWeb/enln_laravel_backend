@extends('auth.layout')


@section('title')
    Create Admin
@endsection
@section('content')
    <form action="/register" method="post" enctype="multipart/form-data">
        @csrf

        {{-- columns  --}}
        <div class="grid md:grid-cols-2 gap-x-2 items-center">


            <section>

                <div class="flex  items-center justify-center w-full" id="zone">


                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full  border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <label class="block  text-sm font-medium text-gray-900 dark:text-white">
                                    Profile Picture</label>
                                <p id="file-label" class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click
                                        to
                                        upload</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG(MAX.
                                    5MB)
                                </p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" name="profile"
                                onchange="updateFileName()" />
                        </label>
                    </div>
                </div>

            </section>


            <aside>


                {{-- Email --}}
                <div>
                    <label for="input-group-1" class="block  text-sm font-medium text-gray-900 dark:text-white">
                        Email</label>
                    <div class="relative mb-2">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path
                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path
                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                        </div>
                        <input type="text" id="input-group-1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 px-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="enln@gmail.com" name="email" value="{{ old('email') }}">

                    </div>
                    @error('email')
                        <x-typography.error-form>{{ $message }}</x-typography.error-form>
                    @enderror
                </div>


                {{-- Name --}}
                <div>
                    <label for="website-admin"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                        </span>
                        <input type="text"
                            class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="username" name="name" value="{{ old('name') }}">

                    </div>
                    @error('name')
                        <x-typography.error-form>{{ $message }}</x-typography.error-form>
                    @enderror
                </div>
            </aside>
        </div>

        <div class="grid md:grid-cols-2 gap-x-4 ">
            {{-- password section --}}
            <div>
                <label for="website-admin"
                    class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <div class="flex">
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <iconify-icon icon="carbon:password"></iconify-icon>

                    </span>
                    <input
                        class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="****" name="password" type="password">
                </div>
            </div>

            {{-- password confirmation --}}
            <div>
                <label for="website-admin" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                    Password</label>
                <div class="flex">
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <iconify-icon icon="carbon:password"></iconify-icon>

                    </span>
                    <input
                        class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="****" name="password_confirmation" type="password">
                </div>

                @error('password')
                    <x-typography.error-form>{{ $message }}</x-typography.error-form>
                @enderror
            </div>
        </div>


        <button type="submit" class="py-2 w-full text-white bg-blue-500 text-center rounded-lg font-semibold my-2">
            Create Admin
        </button>

        <div><a href="{{ route('admin.index') }}">
                <div class="flex w-full items-center justify-end">
                    <iconify-icon icon="ep:back" style="color: blue;"></iconify-icon>
                    <p class="text-blue-500 ">Back </p>
                </div>
            </a></div>

    </form>




    <script>
        function updateFileName() {
            var fileInput = document.getElementById('dropzone-file');
            var fileLabel = document.getElementById('file-label');
            let zone = document.getElementById('zone');


            // Check if a file is selected
            if (fileInput.files.length > 0) {
                fileLabel.innerText = 'File selected: ' + fileInput.files[0].name;
                zone.style.border = '2px dashed blue';
            } else {
                fileLabel.innerText = 'Click to upload';
            }
        }
    </script>
@endsection
