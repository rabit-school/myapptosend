<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Game history') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4">
        <form method="GET" class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-4">
            <input type="text" name="search" placeholder="Search location..." value="{{ request('search') }}" class="input input-bordered" />

            <select name="status" class="select select-bordered">
                <option value="">All Status</option>
                <option value="published" @selected(request('status') == 'published')>Win</option>
                <option value="draft" @selected(request('status') == 'draft')>Lose</option>
            </select>

            <select name="platform" class="select select-bordered">
                <option value="">All Platforms</option>
                <option>PragmaticPlay</option>
                <option>Bgaming</option>
                <option>BC game</option>
                <option>Stake</option>
            </select>

            <select name="game" class="select select-bordered">
                <option value="">All Games</option>
                <option>The last queen of nile</option>
                <option>Coco time</option>
                <option>Halloween ritual</option>
                <option>Chimera Lounge</option>
                <option>Lucky little puppies</option>
            </select>

            <input type="date" name="from_date" value="{{ request('from_date') }}" class="input input-bordered" />
            <input type="date" name="to_date" value="{{ request('to_date') }}" class="input input-bordered" />

            <button type="submit" class="btn btn-primary col-span-full md:col-span-1">Filter</button>
        </form>

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Platform</th>
                        <th>User id</th>
                        <th>Game name</th>
                        <th>Bet amount</th>
                        <th>Win amount</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Win/Lose</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ ucfirst($post->status) }}</td>
                        <td>{{ $post->created_at->format('Y-m-d') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No results found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
