<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Register Partner') }}
        </h2>
    </x-slot>

    <form action="{{ route('admin.partners.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Name</label>
            <input type="text" name="name" class="input" value="{{ old('name') }}" required>
        </div>

        <div>
            <label class="block font-medium">License Key</label>
            <input type="text" name="license_key" class="input" value="{{ old('license_key') }}" required>
        </div>

        <div>
            <label class="block font-medium">Allowed Areas (comma-separated)</label>
            <input type="text" name="allowed_areas" class="input" value="{{ old('allowed_areas') }}" required>
        </div>

        <div>
            <label class="block font-medium">Currency Sign</label>
            <input type="text" name="currency_sign" class="input" value="{{ old('currency_sign') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</x-app-layout>
