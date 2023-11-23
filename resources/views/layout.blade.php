<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    <title>ENLN Dashboard</title>
    {{-- Alpine Js  --}}
    <!-- Include Alpine.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>



    {{-- TinyMCE --}}
    {{-- tiny mce --}}
    <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}


    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#tinymce',
            height: 300
        });

        $(document).ready(function() {

            var formId = '#save-content-form';

            $(formId).on('submit', function(e) {
                e.preventDefault();

                var data = $(formId).serializeArray();
                data.push({
                    name: 'body',
                    value: tinyMCE.get('tinymce').getContent()
                });

                $.ajax({
                    type: 'POST',
                    url: $(formId).attr('data-action'),
                    data: data,
                    success: function(response, textStatus, xhr) {
                        window.location = response.redirectTo;
                    },
                    complete: function(xhr) {

                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        var response = XMLHttpRequest;

                    }
                });
            });
        });
    </script>



    {{-- CK ClassicEditor --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script> --}}



    {{-- date picker  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/datepicker.min.js"></script>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>





</head>

<body class="bg-gray-100  dark:bg-gray-900 ">

    <main class="relative">


        <x-header />
        <x-sidebar />
        <div class="p-4 sm:ml-64">
            <div class="p-4  rounded-lg  mt-14 ">

                <x-flash />
                @yield('content')
            </div>
        </div>
    </main>





    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
    </script>


    {{-- working with CK editor --}}
    {{-- <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script> --}}




    {{-- <script type="text/javascript">
        console.log('================================')
        tinymce.init({
            selector: 'textarea#tinymce',
            height: 600
        });

        $(document).ready(function() {

            var formId = '#save-content-form';

            $(formId).on('submit', function(e) {
                e.preventDefault();

                var data = $(formId).serializeArray();
                data.push({
                    name: 'body',
                    value: tinyMCE.get('tinymce').getContent()
                });

                $.ajax({
                    type: 'POST',
                    url: $(formId).attr('data-action'),
                    data: data,
                    success: function(response, textStatus, xhr) {
                        window.location = response.redirectTo;
                    },
                    complete: function(xhr) {

                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        var response = XMLHttpRequest;

                    }
                });
            });
        });
    </script> --}}


    {{-- Date picker  --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/datepicker.min.js"></script> --}}

    {{-- chart --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


</body>

</html>
