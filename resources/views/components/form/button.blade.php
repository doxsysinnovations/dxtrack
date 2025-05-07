@props(['primary', 'action', 'type', 'id', 'form', 'accept', 'outline'])

<button @isset($action) onclick="{{ $action }}" @endisset
    @isset($form) form="{{ $form }}" @endisset
    @isset($type) type="{{ $type }}" @endisset
    @isset($id) id="{{ $id }}" @endisset
    @if (isset($primary))
    {{ $attributes->merge(['class' => 'flex items-center justify-center w-full gap-2 px-6 py-1 text-base font-bold border-4 border-blue-950 rounded-full bg-blue-950 text-white hover:bg-white hover:text-blue-950']) }}>
    @elseif (isset($outline))
    {{ $attributes->merge(['class' => 'flex items-center justify-center w-full gap-2 px-6 py-1 text-base font-bold border-4 border-blue-950 rounded-full bg-white text-blue-950 hover:bg-blue-950 hover:text-white']) }}>
    @else
    {{ $attributes->merge(['class' => 'flex items-center justify-center w-full gap-2 px-6 py-1 text-base font-bold border-4 rounded-full text-blue-950 bg-slate-300 border-slate-300 hover:bg-blue-950 hover:text-white hover:border-blue-950 ']) }}>
    @endif
    {{ $slot }}
</button>


