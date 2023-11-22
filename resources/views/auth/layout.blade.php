<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    <title>ENLN Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>

<body>
    <section class=" bg-stone-300 w-screen min-h-screen flex flex-col items-center justify-center">

        <div class="flex-grow">

        </div>

        <div class="max-w-3xl bg-white p-3 px-6 rounded-lg shadow-lg">

            {{-- header --}}
            <div class="flex space-x-3 items-center ">
                <img src="{{ asset('logo.png') }}" alt="enln logo" width="40px">
                <div>
                    {{-- <x-typography.h6>E N L N</x-typography.h6> --}}
                    <p>Ethiopia Nuitraion Leaders Network</p>
                </div>


            </div>

            <x-typography.h4 class="my-2 text-center">
                @yield('title')
            </x-typography.h4>


            <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
            {{-- form inputs --}}
            @yield('content')
        </div>

        <div class="flex-grow">

        </div>

        <div class="flex items-center w-full justify-center space-x-3">
            <div>
                <img src="{{ asset('helder_logo.png') }}" alt="" class="w-12">
            </div>
            <p>Powerded by Helder Techonologies Solution</p>
        </div>


    </section>

</body>

</html>
