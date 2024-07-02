<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <div class="py-8 px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <form action="{{ route('update_alamat') }}" method="POST">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="no_hp" :value="__('Phone Number')" />
                            <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full" :value="old('no_hp', Auth::user()->no_hp)" required autocomplete="tel" />
                            <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
                        </div>

                        <div>
                            <x-input-label for="alamat" :value="__('Address')" />
                            <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="old('alamat', Auth::user()->alamat)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                        </div>

                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button>{{ __('Submit') }}</x-primary-button>
                        </div>
                    </form>
        </div>
            </div>
                </div>
                    </div>
</x-app-layout>
