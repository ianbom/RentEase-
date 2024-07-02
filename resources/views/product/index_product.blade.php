@extends('../thread/layouts/app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Daftar Produk</h1>

    @if($product->isEmpty())
        <p class="text-gray-700">Tidak ada produk yang tersedia.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($product as $products)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-2">{{ $products->nama_product }}</h2>
                    <p class="text-gray-700 mb-4">Jenis: {{ $products->jenis }}</p>
                    <p class="text-sm text-gray-500 mb-2">Toko: {{ $products->toko->nama_toko }}</p>
                    <div class="mt-4">
                        <h3 class="text-xl font-bold mb-2">Detail Produk</h3>
                        <p class="text-gray-700">Harga: {{ $products->detail_product->harga }}</p>
                        <p class="text-gray-700">Deposito: {{ $products->detail_product->deposito }}</p>
                        <p class="text-gray-700">Denda: {{ $products->detail_product->denda }}</p>
                        <p class="text-gray-700">Deskripsi: {{ $products->detail_product->deskripsi }}</p>
                        <p class="text-gray-700">Kondisi: {{ $products->detail_product->kondisi }}</p>
                        <p class="text-gray-700">Brand: {{ $products->detail_product->brand }}</p>
                        <a href="{{ route('show.product', $products->product_id) }}">See more</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
