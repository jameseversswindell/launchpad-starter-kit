@cascade

@props([
    'title',
    'description'   => false,
    'robots'        => false,
    'sidebar'       => false,
])


@if (!$logged_in)
  <s:redirect to="/login" />
@endif


<x-layout :title="$title" class="[ flex flex-col min-h-screen ]">

    @include('docs.partials.header')

    <main class="[ flex-auto ] [ flex flex-col ]">
        <div class="relative mx-auto flex w-full max-w-7xl flex-auto justify-center sm:px-2 lg:px-8 xl:px-12">
            @include('docs.partials.nav')

            <div class="min-w-0 max-w-2xl flex-auto px-4 py-16 lg:max-w-none lg:px-8">
                <article>
                    {{ $slot }}
                </article>
            </div>

            @if($sidebar)
                <div class="hidden xl:sticky xl:top-[4.75rem] xl:-mr-6 xl:block
                {{-- xl:h-[calc(100vh-4.75rem)]  --}}
                xl:flex-none xl:overflow-y-auto xl:py-16 xl:pr-6">
                    {{ $sidebar }}
                </div>
            @endif
        </div>
    </main>

    @include('docs.partials.footer')

</x-layout>