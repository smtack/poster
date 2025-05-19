<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('posts.make_a_post') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('posts.whats_on_your_mind') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('create') }}" class="mt-6 space-y-6">
                            @csrf

                            <div>
                                <x-textarea id="post" name="post" class="mt-1 block w-full h-48 resize-none" :value="old('post')" required autofocus autocomplete="post"></x-textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('post')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('posts.to_post') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

    @foreach($posts as $post)
        <div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-post-card :post="$post" />
        </div>
    @endforeach

    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ $posts->links() }}
    </div>
</x-app-layout>
