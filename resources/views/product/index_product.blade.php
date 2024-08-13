@extends('../thread/layouts/app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Daftar Produk</h1>

    @if($product->isEmpty())
        <p class="text-gray-700">Tidak ada produk yang tersedia.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($product as $products)
            @php
                $detail = $products->detail_product
            @endphp
                    <x-card-product :products="$products" :detail="$detail" />
            @endforeach
        </div>
    @endif
</div>
@endsection
