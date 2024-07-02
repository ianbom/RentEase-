@extends('../thread/layouts/app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold">Threads</h1>
    </div>

    @if($thread->isEmpty())
        <div class="text-center text-gray-500">
            <p class="text-xl">Thread kosong</p>
        </div>
    @else
        <div class="flex justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($thread as $threadItem)
                    <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full mx-auto my-6">
                        <h2 class="text-2xl font-semibold mb-2">{{ $threadItem->title }}</h2>
                        <p class="text-gray-700">{{ Str::limit($threadItem->konten, 150) }}</p>
                        <p class="mt-4 text-sm text-gray-500">Posted by: {{ $threadItem->user->name }}</p>
                        <div class="mt-4">
                            <a href="{{ route('show.thread', $threadItem->thread_id) }}" class="text-blue-500 hover:underline">Read more</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
