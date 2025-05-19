<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('profile.users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach($users as $user)
            <div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-user-card :user="$user" />
            </div>
        @endforeach
    </div>

    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ $users->links() }}
    </div>
</x-app-layout>
