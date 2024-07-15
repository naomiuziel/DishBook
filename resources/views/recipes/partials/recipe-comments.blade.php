<h3 class="font-semibold text-2xl mb-4 text-gray-800 leading-tight">Comments</h3>

@if (!$comments->count())
    <p class="text-gray-500 pt-2">No comments available.</p>
@else
    @foreach ($comments as $comment)
        <x-card class="mb-4">
            <p class="mb-2">
                <strong>{{ $comment->user->name ?? 'Anonymous' }}</strong> said
                {{ $comment->created_at->diffForHumans() }}
            </p>
            <p>{{ $comment->comment }}</p>
        </x-card>
    @endforeach
@endif

<form action="/recipes/{{ $recipe->id }}/post-comment" method="POST">
    @csrf
    <x-textarea id="comment" name="comment" class="mt-1 block w-full" rows="4" :value="old('comment')"
        placeholder="Enter your comment..." />
    <x-primary-button class="mt-4">{{ __('Post comment') }}</x-primary-button>
</form>
