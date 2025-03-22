<title>{{ $page->page_title ?? $page->title }} {{ $seo->separator ?? '-' }} {{ $seo->website_title ?? config('app.name', 'Laravel') }}</title>

@if($description)
<meta name="description" content="{!! ($description) ? $description : $title !!}">
@endif

@if($robots)
<meta name="robots" content="{{ $robots }}">
@endif