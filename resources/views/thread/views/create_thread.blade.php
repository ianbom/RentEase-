@extends('../thread/layouts/app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold">Create Thread</h1>
    </div>

    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ route('store.thread') }}" method="POST">
            @csrf

            <div class="mb-4">
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus autocomplete="title" />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div class="mb-4">
                <x-input-label for="konten" :value="__('Content')" />
                <textarea id="konten" name="konten" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5" required>{{ old('konten') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('konten')" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Create Thread') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection
