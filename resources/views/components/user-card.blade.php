@props(['user'])

<div class="bg-white overflow-hidden shadow-xs sm:rounded-lg border border-black/5 hover:bg-slate-50 hover:cursor-pointer" onclick="location.href='{{ route('profile', $user->username) }}'">
    <div class="p-6 relative text-gray-900">
        <section>
            <header>
                <div class="inline">
                    <div class="float-left mr-6">
                        <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-14 h-14 rounded-full inline">
                    </div>

                    <div>
                        <a href="{{ route('profile', $user->username) }}"><h2 class="inline text-lg font-medium text-indigo-400">{{ $user->name }}<span class="ml-2 text-sm font-medium text-gray-900">{{ __('@') . $user->username }}</span></h2></a>
                    </div>
                </div>
                <span class="mt-1 text-sm text-gray-600">
                    {{ __('profile.joined_on') . ' ' . $user->created_at->format('j F Y') }}
                </span>
            </header>

            <div class="mt-4 text-gray-800">
                <p>{{ $user->bio }}</p>
            </div>

            <div>
                <span class="block mt-2 text-sm text-gray-500">
                    {{ __('profile.followers') }}: {{ $user->followers()->count() }} &bull;
                    {{ __('posts.posts') }}: {{ $user->posts()->count() }} &bull;
                    {{ __('posts.comments') }}: {{  $user->comments()->count() }} &bull;
                    {{ __('posts.likes') }}: {{ $user->likes()->count() }}
                </span>
            </div>

            <div class="mt-3 absolute top-4 right-6">
                @if (!$user->is(auth()->user()))
                     @if(Auth::user()->follows($user))
                        <form method="post" action="{{ route('users.unfollow', $user->id) }}">
                            @csrf
                            <x-primary-button class="bg-red-500 hover:bg-red-400 focus:bg-red-700 active:bg-red-900 focus:ring-red-500">{{ __('profile.unfollow') }}</x-primary-button>
                        </form>
                    @else
                        <form method="post" action="{{ route('users.follow', $user->id) }}">
                            @csrf
                            <x-primary-button>{{ __('profile.follow') }}</x-primary-button>
                        </form>
                    @endif
                @endif
            </div>
        </section>
    </div>
</div>
