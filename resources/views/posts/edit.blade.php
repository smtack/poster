<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('posts.edit_post') }}
        </h2>
    </x-slot>

    <div class="pt-12 pb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('posts.edit_post') }}
                            </h2>
                        </header>
                        <form method="post" action="{{ route('update', $post) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PATCH')

                            <div>
                                <x-input-label for="post" :value="__('posts.post')" />
                                <x-textarea id="post" name="post" class="mt-1 block w-full h-48 resize-none" :value="old('post', $post->post)" required autofocus autocomplete="post">{{ $post->post }}</x-textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('post')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('posts.edit_post') }}</x-primary-button>
                            </div>
                        </form>
                        <form method="post" action="{{ route('delete', $post) }}" class="mt-6 space-y-6 flex justify-end">
                            @csrf
                            @method('DELETE')

                            <div class="flex items-center gap-4">
                                <x-danger-button>{{ __('posts.delete_post') }}</x-danger-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
