@extends('../thread/layouts/app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">My Wishlists</h1>

    @if($wishlists->isEmpty())
        <p class="text-gray-700">You have no products in your wishlist.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($wishlists as $wishlist)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4">Wishlist Saya</h2>
                    @if($wishlist->products->isEmpty())
                        <p class="text-gray-700">No products in this wishlist.</p>
                    @else
                        <ul>
                            @foreach($wishlist->products as $product)
                                <li class="mb-2">
                                    <a href="{{ route('show.product', $product->product_id) }}" class="text-blue-500 hover:underline">
                                        {{ $product->nama_product }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
