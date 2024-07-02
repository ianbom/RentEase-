@extends('../thread/layouts/app')

@php
function formatRupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
@endphp

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">My Orders</h1>

    @if($orders->isEmpty())
        <p class="text-gray-700">You have no orders.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($orders as $order)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4">Order #{{ $order->order_id }}</h2>
                    <p class="text-gray-700 mb-2">Product: {{ $order->product->nama_product }}</p>
                    <p class="text-gray-700 mb-2">Store: {{ $order->product->toko->nama_toko }}</p>
                    <p class="text-gray-700 mb-2">Harga: {{ formatRupiah($order->product->detail_product->harga) }},00</p>
                    <p class="text-gray-700 mb-2">Start Date: {{ $order->tanggal_mulai_sewa }}</p>
                    <p class="text-gray-700 mb-2">End Date: {{ $order->tanggal_selesai_sewa }}</p>
                    <p class="text-gray-700 mb-2">Total Price: {{ formatRupiah($order->total_harga) }},00</p>
                    <p class="text-gray-700 mb-2">Status: {{ ucfirst($order->status) }}</p>
                    <a class="text-blue-700 mb-2" href="{{ route('orders.showTenant', $order->order_id) }}"> See Detail Order</a>
                    @if($order->deskripsi)
                        <p class="text-gray-700 mb-2">Description: {{ $order->deskripsi }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
