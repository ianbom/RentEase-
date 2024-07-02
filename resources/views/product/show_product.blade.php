@extends('../thread/layouts/app')

@section('content')
<div class="container mx-auto px-4 py-8" x-data="{ open: false }">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Detail Product Section -->
            <div>
                <h1 class="text-3xl font-bold mb-4">{{ $product->nama_product }}</h1>
                <p class="text-gray-700 mb-6">Jenis: {{ $product->jenis }}</p>
                <p class="text-sm text-gray-500 mb-4">Toko: {{ $product->toko->nama_toko }}</p>
                <p class="text-sm text-gray-500 mb-4">Pemilik: {{ $product->toko->user->name }}</p>
                @if($product->detail_product)
                    <p class="text-gray-700">Harga: {{ $product->detail_product->harga }}</p>
                    <p class="text-gray-700">Deposit: {{ $product->detail_product->deposito }}</p>
                    <p class="text-gray-700">Denda: {{ $product->detail_product->denda }}</p>
                    <p class="text-gray-700">Deskripsi: {{ $product->detail_product->deskripsi }}</p>
                    <p class="text-gray-700">Kondisi: {{ $product->detail_product->kondisi }}</p>
                    <p class="text-gray-700">Brand: {{ $product->detail_product->brand }}</p>
                @else
                    <p class="text-gray-700">Detail produk tidak tersedia.</p>
                @endif
                <a href="{{ route('index.product') }}" class="text-blue-500 hover:underline">Kembali ke Daftar Produk</a>

                <form action="{{ route('add.wishlist', $wishlistId) }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                    <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded-lg">Add to Wishlist</button>
                </form>

                <!-- Button to open the modal -->
                <button @click="open = true" class="bg-blue-500 text-black px-4 py-2 rounded-lg mt-4">Order Product</button>
            </div>

            <!-- Reviews Section -->
            <div>
                <h2 class="text-2xl font-bold mb-4">Reviews</h2>
                @if($product->ratings->isEmpty())
                    <p class="text-gray-700">Belum ada ulasan.</p>
                @else
                    @foreach($product->ratings as $rating)
                        <div class="border-b border-gray-200 mb-4 pb-4">
                            <p class="text-gray-700 mb-1"><strong>{{ $rating->order->user->name }}</strong> rated:</p>
                            <p class="text-yellow-500 mb-1">{{ str_repeat('★', $rating->rating) . str_repeat('☆', 5 - $rating->rating) }}</p>
                            <p class="text-gray-700">{{ $rating->review }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Modal -->
        <div x-show="open" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Order Product
                                </h3>
                                <div class="mt-2">
                                    <form action="{{ route('order.store') }}" method="POST" class="mt-4">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                        <div class="mb-4">
                                            <label for="tanggal_mulai_sewa" class="block text-gray-700">Tanggal Mulai Sewa</label>
                                            <input type="date" id="tanggal_mulai_sewa" name="tanggal_mulai_sewa" class="mt-1 block w-full">
                                        </div>
                                        <div class="mb-4">
                                            <label for="tanggal_selesai_sewa" class="block text-gray-700">Tanggal Selesai Sewa</label>
                                            <input type="date" id="tanggal_selesai_sewa" name="tanggal_selesai_sewa" class="mt-1 block w-full">
                                        </div>
                                        <div class="mb-4">
                                            <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                                            <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 block w-full"></textarea>
                                        </div>
                                        <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded-lg">Order Product</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button @click="open = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
