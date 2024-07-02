@extends('../thread/layouts/app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-4">Order #{{ $order->order_id }}</h1>
        <p class="text-gray-700 mb-2">Product: {{ $order->product->nama_product }}</p>
        <p class="text-gray-700 mb-2">Toko By: {{ $order->product->toko->user->name }}</p>
        <p class="text-gray-700 mb-2">Ordered by: {{ $order->user->name }}</p>
        <p class="text-gray-700 mb-2">Start Date: {{ $order->tanggal_mulai_sewa }}</p>
        <p class="text-gray-700 mb-2">End Date: {{ $order->tanggal_selesai_sewa }}</p>
        <p class="text-gray-700 mb-2">Description: {{ $order->deskripsi }}</p>
        <p class="text-gray-700 mb-2">Total Price: Rp {{ number_format($order->total_harga, 2) }}</p>
        <p class="text-gray-700 mb-2">Status: {{ ucfirst($order->status) }}</p>

        <div class="flex justify-between mt-4">
            <!-- Form to update status to 'ditolak' -->
            <form action="{{ route('orders.updateStatus', $order->order_id) }}" method="POST">
                @csrf
                <input type="hidden" name="status" value="batal">
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">Set to Ditolak</button>
            </form>
        </div>

        <div class="mt-4">

            @if($order->ratings)
            <h2 class="text-2xl font-bold mb-4">Your Review</h2>
                <p class="text-gray-700 mb-2">Your Rating: {{ $order->ratings->rating }} stars</p>
                <p class="text-gray-700 mb-2">Your Review: {{ $order->ratings->review }}</p>
            @else
            <h2 class="text-2xl font-bold mb-4">Rate this product</h2>
                <form action="{{ route('orders.rate', $order->order_id) }}" method="POST">
                    @csrf
                    <label for="rating" class="block text-gray-700">Rate this product:</label>
                    <select id="rating" name="rating" class="mt-1 block w-full">
                        <option value="">Select a rating</option>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <label for="review" class="block text-gray-700 mt-4">Review:</label>
                    <textarea id="review" name="review" rows="4" class="mt-1 block w-full"></textarea>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-2">Submit Rating</button>
                </form>
            @endif
        </div>

        <a href="{{ route('orders.index') }}" class="text-blue-500 hover:underline mt-4 block">Back to My Orders</a>
    </div>
</div>
@endsection
