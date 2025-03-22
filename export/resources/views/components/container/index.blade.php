@props([
    'xs'     => false,
    'sm'     => false,
    'md'     => false,
    'lg'     => false,
    'xl'     => false,
    'full'   => false, // fits the viewport width
    'expand' => false, // determines if container should expand to fit the whole viewport on smaller viewports but be constrained on larger viewports
])


{{-- Define the container as a custom element for better semantic usage --}}
@once
@push('web-components')
<script type="module">
    class ContainerElement extends HTMLElement {
        constructor() {
            super();
        }
    }
    customElements.define("container-element", ContainerElement);
</script>
@endpush
@endonce


<container-element {{ $attributes->class([
            '[ container ] [ block mx-auto w-full px-gutter-sm md:px-gutter-md ' . (($expand) ? '' : ' max-w-prose') . ' ]',
            '[ lg:max-w-prose ]'     => $xs,
            '[ lg:max-w-screen-sm ]' => $sm,
            '[ lg:max-w-screen-md ]' => $md,
            '[ lg:max-w-screen-lg ]' => $lg,
            '[ lg:max-w-screen-xl ]' => $xl,
            '[ lg:max-w-full ]'      => $full
        ]) }}
>
    {{ $slot }}
</container-element>