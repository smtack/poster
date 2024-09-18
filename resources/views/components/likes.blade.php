@props(['post'])

<div class="mt-4">
    @if (!Auth::user()->likesPost($post))
        <form action="{{ route('posts.like', $post->id) }}" method="POST">
            @csrf

            <button type="submit">
                <span class="text-sm"><img class="w-6 h-6 inline" src="{{ asset('images/icons/heart.svg') }}" alt="Like"> {{ $post->likes_count }}</span>
            </button>
        </form>
    @else
        <form action="{{ route('posts.unlike', $post->id) }}" method="POST">
            @csrf

            <button type="submit">
                <span class="text-sm"><img class="w-6 h-6 inline" src="{{ asset('images/icons/heart-full.svg') }}" alt="Unlike"> {{ $post->likes_count }}</span>
            </button>
        </form>
    @endif
</div>
