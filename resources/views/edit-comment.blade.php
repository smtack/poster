<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Comment') }}
        </h2>
    </x-slot>

    <div class="pt-12 pb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Edit Comment') }}
                            </h2>
                        </header>
                        <form method="post" action="{{ route('update-comment', $comment) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PATCH')

                            <div>
                                <x-input-label for="comment" :value="__('Comment')" />
                                <x-textarea id="comment" name="comment" class="mt-1 block w-full h-32 resize-none" :value="old('comment', $comment->comment)" required autofocus autocomplete="comment">{{ $comment->comment }}</x-textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('comment')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Edit Comment') }}</x-primary-button>
                            </div>
                        </form>
                        <form method="post" action="{{ route('delete-comment', $comment) }}" class="mt-6 space-y-6 flex justify-end">
                            @csrf
                            @method('DELETE')

                            <div class="flex items-center gap-4">
                                <x-danger-button>{{ __('Delete Comment') }}</x-danger-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
