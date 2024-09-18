<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Top Users') }}
        </h2>
    </x-slot>

    @foreach($users as $user)
        <div class="mt-4 py-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-black/5 hover:bg-slate-50 hover:cursor-pointer" onclick="location.href='{{ route('profile', $user->username) }}'">
                <div class="p-6 relative text-gray-900">
                    <section>
                        <header>
                            <div class="float-left mr-6">
                                <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-8 h-8 rounded-full inline">
                            </div>
                            <div>
                                <a href="{{ route('profile', $user->username) }}"><h2 class="inline text-lg font-medium text-indigo-400">{{ $user->name }}<span class="ml-2 text-sm font-medium text-gray-900">{{ __('@') . $user->username }}</span></h2></a>
                            </div>
                        </header>

                        <div class="mt-4">
                            <p class="mt-4 text-sm text-gray-700">{{ $user->bio }}</p>

                            <span class="block mt-2 text-sm text-gray-500">Followers: {{ $user->followers()->count() }} &bull; Posts: {{ $user->posts()->count() }}</span>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    @endforeach

    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ $users->links() }}
    </div>
</x-app-layout>
