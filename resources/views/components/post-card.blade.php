@props(['post'])

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-black/5 hover:bg-slate-50 hover:cursor-pointer" onclick="location.href='{{ route('post', $post) }}'">
    <div class="p-6 relative text-gray-900">
        <section>
            <header>
                <div class="inline">
                    <img src="{{ asset('storage/avatars/' . $post->user->avatar) }}" alt="{{ $post->user->name }}" class="w-8 h-8 rounded-full inline">

                    <a href="{{ route('profile', $post->user->username) }}"><h2 class="inline ml-1 text-lg font-medium text-indigo-400">{{ $post->user->name }}<span class="ml-2 text-sm font-medium text-gray-900">{{ __('@') . $post->user->username }}</span></h2></a>
                </div>
                <span class="mt-1 text-sm text-gray-600">
                    {{ $post->created_at->diffForHumans() }}
                </span>
            </header>

            <div class="mt-4">
                <p>{{ $post->post }}</p>
            </div>

            <div>
                <x-likes :post="$post" />
            </div>

            <div class="mt-3 absolute top-4 right-6">
                @if ($post->user->is(auth()->user()))
                    <a href="{{ route('edit', $post) }}" class="text-indigo-400"><img class="w-6" src="{{ asset('images/icons/edit.svg') }}" alt="Edit Post" /></a>
                @endif
            </div>
        </section>
    </div>
</div>
