<!-- resources/views/components/product-card.blade.php -->
@props(['products', 'detail'])

<div class="max-w-sm rounded overflow-hidden shadow-lg">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $products->nama_product }}</div>
        <p class="text-gray-700 text-base">
            {{ $detail->deskripsi  }}
        </p>
    </div>
    <div class="px-6 pt-4 pb-2">
        <span class="block bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-semibold mr-2 mb-2">
            Rp {{ number_format($detail->harga) }}
        </span>
        <a href="{{ route('show.product', $products->product_id) }}" class="block mt-4 text-center bg-green-500 text-white px-4 py-2 rounded-lg">
            View Details
        </a>
    </div>
</div>
