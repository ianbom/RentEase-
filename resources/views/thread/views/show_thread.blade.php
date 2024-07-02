@extends('../thread/layouts/app')

@section('content')
<div class="mt-6 mb-4">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column (Thread and Likes) -->
            <div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h1 class="text-3xl font-bold mb-4">{{ $thread->title }}</h1>
                    <p class="text-gray-700 mb-6">{{ $thread->konten }}</p>
                    <p class="text-sm text-gray-500 mb-4">Posted by: {{ $thread->user->name }}</p>

                    <div class="flex items-center mb-4">
                        @if($thread->likes->contains('user_id', Auth::id()))
                            <form action="{{ route('unlike.thread', $thread->thread_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-red-500 text-black rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-opacity-50">
                                    Unlike
                                </button>
                            </form>
                        @else
                            <form action="{{ route('like.thread', $thread->thread_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-black rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                                    Like
                                </button>
                            </form>
                        @endif
                        <p class="ml-4 text-gray-700">{{ $thread->likes->count() }} likes</p>
                    </div>

                    <a href="{{ route('index.thread') }}" class="text-blue-500 hover:underline">Back to Threads</a>
                </div>
            </div>

            <!-- Right Column (Comments and Replies) -->
            <div>
                <div class="bg-white p-6 rounded-lg shadow-lg ">
                    <h2 class="text-2xl font-bold mb-4">Comments</h2>
                    @foreach($thread->komentars as $komentar)
                        <div class="bg-gray-100 p-4 rounded-lg mb-4">
                            <p>{{ $komentar->komentar }}</p>
                            <p class="text-sm text-gray-500 mt-2">Posted by: {{ $komentar->user->name }}</p>
                            @if($komentar->user_id == Auth::id())
                                <form action="{{ route('delete.komentar', $komentar->komentar_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-black rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-opacity-50">
                                        Delete
                                    </button>
                                </form>
                            @endif

                            <!-- Display replies -->
                            <div class="ml-8 mt-4">
                                @foreach($komentar->replies as $reply)
                                    <div class="bg-gray-200 p-4 rounded-lg mb-4">
                                        <p>{{ $reply->reply }}</p>
                                        <p class="text-sm text-gray-500 mt-2">Replied by: {{ $reply->user->name }}</p>
                                        @if($reply->user_id == Auth::id())
                                            <form action="{{ route('delete.reply', $reply->reply_komentar_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this reply?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 bg-red-500 text-black rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-opacity-50">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <!-- Reply form -->
                            <form action="{{ route('add.reply', $komentar->komentar_id) }}" method="POST">
                                @csrf
                                <div class="mt-4">
                                    <textarea id="reply" name="reply" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3" required>{{ old('reply') }}</textarea>
                                    @error('reply')
                                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <button type="submit" class="px-4 py-2 bg-blue-500 text-black rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                                        {{ __('Reply') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endforeach

                    <h2 class="text-2xl font-bold mb-4 mt-8">Add a Comment</h2>
                    <form action="{{ route('add.komentar', $thread->thread_id) }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <textarea id="komentar" name="komentar" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5" required>{{ old('komentar') }}</textarea>
                            @error('komentar')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-black rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                                {{ __('Post Comment') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
