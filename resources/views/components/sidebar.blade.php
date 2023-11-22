<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    @php
        $links = [
            'dashboard' => [
                'icon' => '<iconify-icon icon="fluent:data-pie-24-regular" width="26"></iconify-icon>',
                'label' => 'Dashboard',
                'path' => '/',
            ],
            'annouencemnt' => [
                'icon' => '<iconify-icon icon="mingcute:announcement-line" width="26"></iconify-icon>',
                'label' => 'Announcemnt',
                'path' => '/announcements',
            ],
            'events' => [
                'label' => 'Events',
                'path' => '/events',
            ],
            'news' => [
                'icon' => ' <iconify-icon icon="fluent:news-24-regular" width="26"></iconify-icon>',
                'label' => 'News',
                'path' => '/new',
            ],

            'resources' => [
                'icon' => '<iconify-icon icon="ph:books" width="26"></iconify-icon>',
                'label' => 'Resources',
                'path' => '/ebook',
            ],
            'members' => [
                'icon' => '<iconify-icon icon="bi:people" width="26"></iconify-icon>',
                'label' => 'Memebers',
                'path' => '/',
            ],
            'subscriber' => [
                'icon' => '<iconify-icon icon="ic:outline-email" width="26"></iconify-icon>',
                'label' => 'Subscribers',
                'path' => '/subscriber',
            ],
            'admin' => [
                'icon' => '<iconify-icon icon="eos-icons:admin-outlined" width="26"></iconify-icon>',
                'label' => 'Admin',
                'path' => '/',
            ],
        ];

    @endphp


    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">

            @foreach ($links as $key => $value)
                @if ($key == 'events')
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">

                            <iconify-icon icon="carbon:event" width="26"></iconify-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Events</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="dropdown-example" class="hidden py-2 space-y-2">
                            <li>
                                <a href="/upcoming"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    <iconify-icon icon="clarity:event-line" width="22"></iconify-icon>
                                    <span class="ml-1">Upcoming</span>
                                </a>
                            </li>
                            <li>
                                <a href="/forum"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    <iconify-icon icon="ic:outline-upcoming" width="22"></iconify-icon>
                                    <span class="ml-1">Annual Forum</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @else
                    <x-sidebar-item :title="$value['label']" :path="$value['path']">
                        {!! $value['icon'] !!}
                    </x-sidebar-item>
                @endif
            @endforeach
        </ul>
    </div>
</aside>
