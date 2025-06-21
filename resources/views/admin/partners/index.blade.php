<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Partners') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-right">
            <a href="{{ route('admin.partners.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-black font-semibold py-2 px-4 rounded mb-4">Register Partner</a>
        </div>


        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>License Key</th>
                    <th>Allowed Areas</th>
                    <th>Currency</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partners as $partner)
                <tr>
                    <td>{{ $partner->name }}</td>
                    <td>{{ $partner->license_key }}</td>
                    <td>{{ is_array($partner->allowed_areas) ? implode(', ', $partner->allowed_areas) : $partner->allowed_areas }}</td>
                    <td>{{ $partner->currency_sign }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
