@extends('../thread/layouts/app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Buat Toko Baru</h1>
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
        @if (session('status'))
            <div class="mb-4 text-green-500">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('store.toko') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nama_toko" class="block text-gray-700">Nama Toko:</label>
                <input type="text" name="nama_toko" id="nama_toko" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                @error('nama_toko')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5" required></textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="alamat_toko" class="block text-gray-700">Alamat Toko:</label>
                <input type="text" name="alamat_toko" id="alamat_toko" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                @error('alamat_toko')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-black rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                    Buat Toko
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
