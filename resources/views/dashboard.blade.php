<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Playing now") }} : 1356
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center">
                    <div class="flex flex-col items-center">
                        <span class="inline-block bg-blue-200 px-4 py-2">The last queen of nile</span>
                        <span class="inline-block bg-green-200 px-4 py-2">223</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="inline-block bg-blue-200 px-4 py-2">Coco time</span>
                        <span class="inline-block bg-green-200 px-4 py-2">123</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="inline-block bg-blue-200 px-4 py-2">Halloween ritual</span>
                        <span class="inline-block bg-green-200 px-4 py-2">312</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="inline-block bg-blue-200 px-4 py-2">Chimera Lounge</span>
                        <span class="inline-block bg-green-200 px-4 py-2">212</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="inline-block bg-blue-200 px-4 py-2">Lucky little puppies</span>
                        <span class="inline-block bg-green-200 px-4 py-2">456</span>
                    </div>
                </div>

                <div id="map"></div>
            </div>
        </div>

        <script>
            // Initialize the map
            var map = L.map('map').setView([20, 0], 2); // Centered on the world

            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors',
                maxZoom: 18,
            }).addTo(map);

            const markers = [
                { lat: 35.6895, lng: 139.6917, label: 'Tokyo : lqon(63), coco(32)' },
                { lat: 51.5072, lng: -0.1276, label: 'London : lounge(50)' },
                { lat: 40.7128, lng: -74.0060, label: 'New York : coco(78), llpup(123)' },
                { lat: -33.8688, lng: 151.2093, label: 'Sydney : halloween(46)' },
            ];

            markers.forEach(marker => {
                L.marker([marker.lat, marker.lng])
                    .addTo(map)
                    .bindTooltip(marker.label, { permanent: true, direction: 'top' });
            });
        </script>
    </div>
</x-app-layout>
