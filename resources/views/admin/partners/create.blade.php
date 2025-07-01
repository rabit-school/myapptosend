<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Register Partner') }}
        </h2>
    </x-slot>

    <form action="{{ route('admin.partners.store') }}" method="POST" class="max-w-7xl mx-auto space-y-6">
        @csrf
        @include('admin.partners.form')
    </form>
</x-app-layout>
