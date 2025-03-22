<s:nav handle="main_nav" as="entries">
    @foreach($entries as $entry)

        @if($entry['children'])

        <li x-data="{ dropdown: false }">

            <button
                @click="dropdown = !dropdown"
                class="
                    text-sm/6 font-semibold text-gray-900 inline-block relative
                    {{ ( $entry['is_current'] ) ? 'text-indigo-600' : '' }}
                "
            >
                {{ $entry['title'] }}

                {{-- Arrow down --}}
                <svg x-show="!dropdown" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 absolute -right-5 top-1/2 -translate-y-1/2">
                    <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>

                {{-- Arrow up --}}
                <svg x-show="dropdown" x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 absolute -right-5 top-1/2 -translate-y-1/2">">
                    <path fill-rule="evenodd" d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z" clip-rule="evenodd" />
                </svg>
            </button>

            <ul x-show="dropdown" x-cloak @click.outside="dropdown = false" class="absolute bg-white border border-gray-200 mt-1 py-2 px-4 rounded-lg shadow-lg text-sm/6 w-48 z-10">
                {{-- Show the entry top level link as the first child --}}
                @if($entry['url'])
                <li>
                    <a
                        href="{{ $entry['url'] }}"
                        class="
                            text-sm/6 font-semibold text-gray-900
                            {{ ( $entry['is_current'] ) ? 'text-indigo-600' : '' }}
                        "
                    >{{ $entry['title'] }}</a>
                </li>
                @endif

                @foreach($entry['children'] as $child)
                    <li>
                        <a
                            href="{{ $child['url'] }}"
                            class="
                                text-sm/6 font-semibold text-gray-900
                                {{ ( $child['is_current'] ) ? 'text-indigo-600' : '' }}
                            "
                        >{{ $child['title'] }}</a>
                    </li>
                @endforeach
            </ul>
        </li>

        @else

        <li>
            <a
                href="{{ $entry['url'] }}"
                class="
                    text-sm/6 font-semibold text-gray-900
                    {{ ( $entry['is_current'] ) ? 'text-indigo-600' : '' }}
                "
            >{{ $entry['title'] }}</a>
        </li>

        @endif

    @endforeach
</s:nav>