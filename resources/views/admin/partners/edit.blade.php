<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit  Partner') }}
        </h2>
    </x-slot>

    <form class="max-w-7xl mx-auto space-y-6" action="{{ route('admin.partners.update', $partner) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.partners.form', ['partner' => $partner])
    </form>
</x-app-layout>
