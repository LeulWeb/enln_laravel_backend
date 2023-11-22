@props(['title', 'path', 'count'])



<li>
    <a href="{{ $path }}"
        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
        {{ $slot }}
        <span class="flex-1 ml-3 whitespace-nowrap">{{ $title }}</span>
        @if ($count)
            {{ $count }}
        @endif
    </a>
</li>
