<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="pt-12 pb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Edit Post') }}
                            </h2>
                        </header>
                  
                        <form method="post" action="{{ route('update', $post) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PATCH')

                            <div>
                                <x-input-label for="post" :value="__('Post')" />
                                <x-textarea id="post" name="post" class="mt-1 block w-full h-48 resize-none" :value="old('post', $post->post)" required autofocus autocomplete="post">{{ $post->post }}</x-textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('post')" />
                            </div>
                  
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Edit') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Delete Post') }}
                            </h2>
                        </header>
                  
                        <form method="post" action="{{ route('delete', $post) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('DELETE')
                  
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Delete') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
