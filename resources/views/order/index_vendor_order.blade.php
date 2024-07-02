@extends('../thread/layouts/app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Orders for Your Products</h1>

    @if($orders->isEmpty())
        <p class="text-gray-700">No orders found for your products.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($orders as $order)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4">Order #{{ $order->order_id }}</h2>
                    <p class="text-gray-700 mb-2">Product: {{ $order->product->nama_product }}</p>
                    <p class="text-gray-700 mb-2">Ordered by: {{ $order->user->name }}</p>
                    <p class="text-gray-700 mb-2">Start Date: {{ $order->tanggal_mulai_sewa }}</p>
                    <p class="text-gray-700 mb-2">End Date: {{ $order->tanggal_selesai_sewa }}</p>
                    <p class="text-gray-700 mb-2">Description: {{ $order->deskripsi }}</p>
                    <p class="text-gray-700 mb-2">Total Price: Rp {{ number_format($order->total_harga, 2) }}</p>
                    <p class="text-gray-700 mb-2">Status: {{ ucfirst($order->status) }}</p>
                    <a href="{{ route('orders.show', $order->order_id) }}"> See Detail</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
