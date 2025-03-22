@cascade

@props([
    'title',
    'description'   => false,
    'robots'        => false,
    'sidebar'       => false,
])


<x-layout :title="$title" class="[ flex flex-col min-h-screen ]">

    {{-- Header --}}
    @include('page.partials.header')

    {{-- Main --}}
    <main class="[ flex-auto ]">
        <div class="relative mx-auto flex w-full max-w-8xl flex-auto justify-center sm:px-2 lg:px-8 xl:px-12">

            <div class="min-w-0 max-w-2xl flex-auto px-4 py-16 lg:max-w-none lg:pl-8 lg:pr-0 xl:px-16">
                <article>
                    {{ $slot }}
                </article>
            </div>

            {{-- Sidebar --}}
            @if($sidebar)
                <aside class="hidden xl:sticky xl:top-[4.75rem] xl:-mr-6 xl:block xl:h-[calc(100vh-4.75rem)] xl:flex-none xl:overflow-y-auto xl:py-16 xl:pr-6">
                    {{ $sidebar }}
                </aside>
            @endif
        </div>
    </main>

    {{-- Footer --}}
    @include('page.partials.footer')

</x-layout>