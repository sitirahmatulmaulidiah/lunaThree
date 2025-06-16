<div>
    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
    <input type="text" name="nama" id="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('nama', $kategori->nama ?? '') }}" required>
    @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>
<div class="flex justify-end mt-6">
    <button type="submit" class="bg-cyan-600 text-white px-6 py-2 rounded-lg hover:bg-cyan-700">{{ $buttonText }}</button>
</div>