<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Partners') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-end">
            <a href="{{ route('admin.partners.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-black font-semibold py-2 px-4 rounded mb-4">Add Partner</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">{{ session('success') }}</div>
        @endif
        <table class="table-auto w-full border border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th>Name</th>
                    <th>IP</th>
                    <th>Allowed Areas</th>
                    <th>Currency</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partners as $partner)
                <tr>
                    <td class="text-center align-middle py-2 px-4">{{ $partner->name }}</td>
                    <td class="text-center align-middle py-2 px-4"></td>
                    <!-- <td class="text-center align-middle py-2 px-4">{{ $partner->license_key }}</td> -->
                    <td class="text-center align-middle py-2 px-4">{{ is_array($partner->allowed_areas) ? implode(', ', $partner->allowed_areas) : $partner->allowed_areas }}</td>
                    <td class="text-center align-middle py-2 px-4">{{ $partner->currency_sign }}</td>
                    <td class="text-center align-middle py-2 px-4">
                        <a href="{{ route('admin.partners.edit', $partner) }}" class="bg-green-500 hover:bg-green-600 text-white text-sm font-semibold py-1 px-3 rounded">Edit</a>
                        <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold py-1 px-3 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    {{ $partners->links() }}

    </div>
</x-app-layout>
