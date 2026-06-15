<div class="relative">
    @if ($formRef)
        <button @click="$refs['input-{{ $name }}'].value='';$refs['{{ $formRef }}'].submit();" type="button"
            class="flex h-full items-center absolute top-0 right-0 cursor-pointer pr-2 clear-input">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4 text-slate-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    @endif
    <input type="{{ $type }}" x-ref="input-{{ $name }}"
        class="w-full rounded-md border-0 px-2.5 pr-7 py-1.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400
    focus:right-2"
        placeholder="{{ $placeholder }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" autocomplete="off">
</div>
