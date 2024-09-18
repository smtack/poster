<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative p-6 text-gray-900">
                    <section>
                        <header>
                            <div class="float-left mr-8">
                                <img src="{{ asset('storage/avatars/' . $profile->avatar) }}" alt="{{ $profile->name }}" class="w-16 h-16 rounded-full inline">
                            </div>
                            <div>
                                <h2 class="text-lg font-medium text-gray-900">{{ $profile->name }}</h2>
                                <h3 class="text-md font-medium text-gray-900">{{ __('@') . $profile->username }}</h3>
                                <h4 class="mt-1 text-sm text-gray-600">{{ __('Joined on ') .$profile->created_at->format('j F Y') }}</h4>
                                <p class="mt-4 text-sm text-gray-700">{{ $profile->bio }}</p>

                                <span class="block mt-2 text-sm text-gray-500">Followers: {{ $profile->followers()->count() }} &bull; Posts: {{ $profile->posts()->count() }}</span>
                            </div>

                            @auth
                                @if(Auth::id() !== $profile->id)
                                    <div class="mt-3 absolute top-8 right-6">
                                        @if(Auth::user()->follows($profile))
                                            <form method="post" action="{{ route('users.unfollow', $profile->id) }}">
                                                @csrf
                                                <x-primary-button class="bg-red-500 hover:bg-red-400 focus:bg-red-700 active:bg-red-900 focus:ring-red-500">{{ __('Unfollow') }}</x-primary-button>
                                            </form>
                                        @else
                                            <form method="post" action="{{ route('users.follow', $profile->id) }}">
                                                @csrf
                                                <x-primary-button>{{ __('Follow') }}</x-primary-button>
                                            </form>
                                        @endif
                                    </div>
                                @endif
                            @endauth
                        </header>
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
