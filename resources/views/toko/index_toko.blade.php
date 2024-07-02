@extends('../thread/layouts/app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Daftar Toko</h1>
    @if($toko->isEmpty())
        <p class="text-gray-500 text-center">Tidak ada toko</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($toko as $tokos)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-2">{{ $tokos->nama_toko }}</h2>

                    <p class="text-gray-700 mb-4">{{ $tokos->deskripsi }}</p>
                    <p class="text-sm text-gray-500 mb-2">Alamat: {{ $tokos->alamat_toko }}</p>
                    <p class="text-sm text-gray-500">Pemilik: {{ $tokos->user->name }}</p>
                    <a href="{{ route('show.toko', $tokos->toko_id) }}">See all</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
