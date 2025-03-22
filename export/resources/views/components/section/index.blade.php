@props([
    'sm'           => false,
    'md'           => false,
    'lg'           => false,
    'noPaddingTop' => false, // Remove top padding section when it follows another section
])


<section
    {{ $attributes->class([
        '[ section ] [ overflow-hidden ]',
        'py-6 sm:py-12'  => $sm,
        'py-8 sm:py-16'  => $md,
        'py-10 lg:py-20' => $lg,
        '!pt-0'          => $noPaddingTop,
    ]) }}
>
    {{ $slot }}
</section>