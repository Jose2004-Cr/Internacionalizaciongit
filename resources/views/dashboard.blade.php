<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-0">
            {{ __('') }}
        </h2>
    </x-slot>
   
    <div class="py-1">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div>
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
