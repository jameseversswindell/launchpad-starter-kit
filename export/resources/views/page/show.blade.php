<x-layout.page :title="$page->title">

    <x-section md>
        <x-container lg>
            <h1>{{ $page->title }}</h1>

            {{-- <img src="{!! $page->featured_image !!}" class="w-full"> --}}

            {!! $page->content !!}
        </x-container>
    </x-section>

</x-layout.page>