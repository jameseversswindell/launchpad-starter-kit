@props([
    'source'     => false,
    'code'       => false,
    'preview'    => false,
    'padPreview' => false,
])


<div x-data="{
        selectedId: `{{ ($preview) ? 'preview' : 'markup' }}`,
        select(id) {
            this.selectedId = id
        },
        isSelected(id) {
            return this.selectedId === id
        },

        copyToClipboard() {
            // Get the code content
            let codeContent = $el.querySelector('.selected-code').innerText;
            // Use the Clipboard API to copy the content
            navigator.clipboard.writeText(codeContent)
                .then(() => {
                    alert('Code copied to clipboard!');
                })
                .catch(err => {
                    console.error('Failed to copy: ', err);
                });
        }
    }"
    class="[ code-preview ] [ not-prose space-y-2 ]"
>
    <div class="[ code-preview__toolbar ] [ flex justify-between items-center gap-2 ]">
        <div class="ml-auto flex items-center">
            <div class="flex space-x-1 rounded-lg bg-slate-100 p-0.5" role="tablist" aria-orientation="horizontal">
                @if($preview)
                <button
                    @click="select('preview')"
                    class="flex items-center rounded-md py-[0.4375rem] pl-2 pr-2 text-sm font-semibold lg:pr-3"
                    :class="(isSelected('preview')) ? ' bg-white shadow' : ''"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>

                    <span class="sr-only lg:not-sr-only lg:ml-2 text-slate-900">Preview</span>
                </button>
                @endif

                <button
                    @click="select('markup')"
                    class="flex items-center rounded-md py-[0.4375rem] pl-2 pr-2 text-sm font-semibold lg:pr-3"
                    :class="(isSelected('markup')) ? ' bg-white shadow' : ''"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                    </svg>

                    <span class="sr-only lg:not-sr-only lg:ml-2 text-slate-600">Markup</span>
                </button>

                @if($source)
                <button
                    @click="select('source')"
                    class="flex items-center rounded-md py-[0.4375rem] pl-2 pr-2 text-sm font-semibold lg:pr-3"
                    :class="(isSelected('source')) ? ' bg-white shadow' : ''"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                    </svg>

                    <span class="sr-only lg:not-sr-only lg:ml-2 text-slate-600">Source Code</span>
                </button>
                @endif
            </div>

            <div class="ml-6 mr-3 hidden h-5 w-px bg-slate-900/10 sm:block"></div>

            <button @click="copyToClipboard()" class="group relative ml-2 hidden h-9 w-9 items-center justify-center sm:flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                </svg>

                <span class="sr-only">Copy</span>
            </button>
        </div>
    </div>

    <div class="[ border rounded-xl overflow-hidden ]">
        <div x-show="isSelected('source')" x-cloak>
            <pre class="[ !m-0 ]"><code class="code-preview__code-block language-html !text-sm" :class="(isSelected('source')) ? 'selected-code' : ''">{{ $source }}</code></pre>
        </div>

        <div x-show="isSelected('markup')" x-cloak>
            <pre class="[ !m-0 ]"><code class="code-preview__code-block language-html !text-sm" :class="(isSelected('markup') || isSelected('preview')) ? 'selected-code' : ''">{{ $code }}</code></pre>
        </div>

        <div x-show="isSelected('preview')" class="{{ ($padPreview) ? 'p-4' : '' }}">
            {!! Blade::render($preview) !!}
        </div>
    </div>
</div>