<div class="flex items-center">
    <label class="w-40 text-gray-700 font-medium">Name</label>
    <input type="text" name="name" class="flex-1 border border-gray-300 rounded px-4 py-2" value="{{ old('name', $partner->name ?? '') }}" required>
</div>

<div class="flex items-center">
    <label class="w-40 text-gray-700 font-medium">License Key</label>
    <input type="text" readonly name="license_key" id="licenseKey" placeholder="License Key" class="flex-1 border border-gray-300 rounded px-4 py-2" value="{{ old('license_key', $partner->license_key ?? '') }}" required>
    <button
        id="generateJwtBtn"
        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded"
        type="button"
    >
        Generate
    </button>
</div>

<div class="flex items-center">
    <label class="w-40 text-gray-700 font-medium">Allowed Areas</label>
    <input type="text" name="allowed_areas" class="flex-1 border border-gray-300 rounded px-4 py-2" value="{{ old('allowed_areas', $partner->allowed_areas ?? '') }}" required>
</div>

<div class="flex items-center">
    <label class="w-40 text-gray-700 font-medium">Currency Sign</label>
    <input type="text" name="currency_sign" class="flex-1 border border-gray-300 rounded px-4 py-2" value="{{ old('currency_sign', $partner->currency_sign ?? '') }}" required>
</div>

<div class="flex justify-end space-x-4">
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Save</button>
    <a href="{{ route('admin.partners.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>
</div>

<script>
  document.getElementById('generateJwtBtn').addEventListener('click', async () => {
    try {
    document.getElementById('generateJwtBtn').disabled = true;
      const response = await fetch('/boffice/generate-jwt', {
        method: 'POST',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
          // Add CSRF token if needed:
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
      });

    //   if (!response.ok) throw new Error('Network response was not ok');
      if (!response.ok) {
        const text = await response.text();
        console.error('Server error:', text);
        throw new Error(`HTTP ${response.status} - ${text}`);
        }
      const data = await response.json();
      document.getElementById('licenseKey').value = data.token;
      document.getElementById('generateJwtBtn').disabled = false;
    } catch (error) {
      alert('Failed to generate JWT: ' + error.message);
    }
  });
</script>