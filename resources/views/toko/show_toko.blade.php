@extends('../thread/layouts/app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
        <h1>Toko:

        </h1>
        <h1 class="text-3xl font-bold mb-4">{{ $toko->nama_toko }}</h1>
        <p class="text-gray-700 mb-6">{{ $toko->deskripsi }}</p>
        <p class="text-sm text-gray-500 mb-4">Alamat: {{ $toko->alamat_toko }}</p>
        <p class="text-sm text-gray-500">Pemilik: {{ $toko->user->name }}</p>
        <a class="text-blue-500 hover:underline" href="{{ route('user', $toko->user->id) }}">Chat Pemilik Toko</a> <br>
        <a href="{{ route('index.toko') }}" class="text-blue-500 hover:underline">Kembali ke Daftar Toko</a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl mx-auto mt-6">
        <h2 class="text-2xl font-bold mb-4">Produk yang Dimiliki</h2>
        @if($toko->products->isEmpty())
            <p class="text-gray-700">Tidak ada produk yang tersedia.</p>
        @else
            <ul>
                @foreach($toko->products as $product)
                    <li class="mb-4">
                        <h3 class="text-xl font-bold">{{ $product->nama_product }}</h3>
                        <p class="text-gray-700">{{ $product->jenis }}</p>
                        @if($product->detail_product)
                            <p class="text-gray-700">Harga: {{ $product->detail_product->harga }}</p>
                            <p class="text-gray-700">Deskripsi: {{ $product->detail_product->deskripsi }}</p>
                            <a href="{{ route('show.product', $product->product_id) }}" class="text-blue-600">See detail</a>
                        @else
                            <p class="text-gray-700">Detail produk tidak tersedia.</p>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
