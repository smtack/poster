<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Bio') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Introduce yourself.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.bio') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <x-textarea id="bio" name="bio" class="mt-1 block w-full h-60 resize-none" required autofocus autocomplete="bio">{{ old('bio', $user->bio) }}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
