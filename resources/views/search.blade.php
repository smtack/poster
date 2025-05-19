<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('posts.search') . ': ' . $query }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach($results as $post)
            <div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-post-card :post="$post" />
            </div>
        @endforeach
    </div>

    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ $results->links() }}
    </div>
</x-app-layout>
