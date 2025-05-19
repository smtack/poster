<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('profile.update_bio') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('profile.introduce_yourself') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.bio') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="bio" :value="__('profile.bio')" />
            <x-textarea id="bio" name="bio" class="mt-1 block w-full h-60 resize-none" required autofocus autocomplete="bio">{{ old('bio', $user->bio) }}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('profile.save') }}</x-primary-button>

            @if (session('status') === 'bio-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('profile.saved') }}</p>
            @endif
        </div>
    </form>
</section>
