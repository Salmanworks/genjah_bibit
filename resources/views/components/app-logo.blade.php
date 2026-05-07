@props([
    'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand name="{{ setting('store_name', 'Plant Power') }}" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-md overflow-hidden">
            <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo" class="w-full h-full object-cover">
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand name="{{ setting('store_name', 'Plant Power') }}" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-md overflow-hidden">
            <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo" class="w-full h-full object-cover">
        </x-slot>
    </flux:brand>
@endif
