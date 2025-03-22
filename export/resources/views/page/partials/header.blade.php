{{--

# Future considerations

- Add a dark mode toggle
- Add a search bar
- Add a language switcher
- Add a cart icon
- Add a notification icon
- Add a user icon
- Add sticky header - always in view, or scroll out of view, then scroll back in view

--}}

<header
    x-data="{ menu: false }"
    class="absolute inset-x-0 top-0 z-50"
>
    {{-- Desktop navigation --}}
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">Build</span>
                @if($company_details->company_logo)
                <img class="w-16 h-auto" src="{{ $company_details->company_logo->url }}" alt="{{ $company_details->company_logo->alt }}" />
                @endif
            </a>
        </div>

        <div @click="menu = true" class="flex lg:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>

        <ul class="hidden lg:flex lg:gap-x-12">
            @include('page.partials.main-nav-links-desktop')
        </ul>

        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @if ($logged_in)
                <a href="{{ Statamic::tag('user:logout_url')->fetch() }}" class="text-sm/6 font-semibold text-gray-900">Log out</a>
            @else
                <a href="/login" class="text-sm/6 font-semibold text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
            @endif
        </div>
    </nav>

    {{-- Mobile navigation --}}
    <div x-cloak x-show="menu" class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div
            x-show="menu"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 bg-black/50"
        ></div>

        <div
            x-show="menu"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10"
        >
            <div class="flex items-center justify-between">
                <a href="/" class="-m-1.5 p-1.5">
                    <span class="sr-only">Build</span>
                    <img class="h-16 w-auto" src="/assets/images/james-evers-swindell-logo-black-2021.svg" alt="James Evers-Swindell logo" width="58" height="65">
                </a>

                <button @click="menu = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <ul class="space-y-2 py-6">
                        @include('page.partials.main-nav-links-mobile')
                    </ul>

                    <div class="py-6">
                        @if ($logged_in)
                            <a class="-mx-3 block rounded-lg px-3 py-2.5 text-base/6 font-semibold text-gray-900 hover:bg-gray-50"" href="{{ Statamic::tag('user:logout_url')->fetch() }}">Log out</a>
                        @else
                            <a class="-mx-3 block rounded-lg px-3 py-2.5 text-base/6 font-semibold text-gray-900 hover:bg-gray-50"" href="/login" class="text-sm/6 font-semibold text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
