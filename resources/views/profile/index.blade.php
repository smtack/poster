<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-user-card :user="$profile" />
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
