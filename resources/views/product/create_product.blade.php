@extends('../thread/layouts/app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Buat Produk Baru</h1>
    <form action="{{ route('store.product') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama_product" class="block text-gray-700">Nama Produk:</label>
            <input type="text" id="nama_product" name="nama_product" class="mt-1 block w-full rounded-md shadow-sm border-gray-300" required>
            @error('nama_product')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="jenis" class="block text-gray-700">Jenis:</label>
            <input type="text" id="jenis" name="jenis" class="mt-1 block w-full rounded-md shadow-sm border-gray-300" required>
            @error('jenis')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="harga" class="block text-gray-700">Harga:</label>
            <input type="number" id="harga" name="harga" class="mt-1 block w-full rounded-md shadow-sm border-gray-300" required>
            @error('harga')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="deposito" class="block text-gray-700">Deposito:</label>
            <input type="number" id="deposito" name="deposito" class="mt-1 block w-full rounded-md shadow-sm border-gray-300" required>
            @error('deposito')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="denda" class="block text-gray-700">Denda:</label>
            <input type="number" id="denda" name="denda" class="mt-1 block w-full rounded-md shadow-sm border-gray-300" required>
            @error('denda')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" class="mt-1 block w-full rounded-md shadow-sm border-gray-300" rows="5" required></textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="kondisi" class="block text-gray-700">Kondisi:</label>
            <input type="text" id="kondisi" name="kondisi" class="mt-1 block w-full rounded-md shadow-sm border-gray-300" required>
            @error('kondisi')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="brand" class="block text-gray-700">Brand:</label>
            <input type="text" id="brand" name="brand" class="mt-1 block w-full rounded-md shadow-sm border-gray-300" required>
            @error('brand')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-black rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                {{ __('Buat Produk') }}
            </button>
        </div>
    </form>
</div>
@endsection
