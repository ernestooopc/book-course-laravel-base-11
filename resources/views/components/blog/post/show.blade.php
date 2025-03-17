@props(['post'])
<div class="container mx-auto p-4">
    <div class="card card-black mt-2">
        <h1>{{ $post->title }}</h1>
        <span>{{ $post->category->title }}</span>
        <hr>
        {{ $attributes->filter(fn(string $value, string $key) => $key == 'data-id') }}
        <p>{{ $post->content }}</p>
    </div>
</div>
