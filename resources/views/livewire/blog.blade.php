<div>
    @foreach ($blog as $post)
    <div class="card mb-3">
        <div class="card-header bg-dark text-white">
            {{ $post->nombre }}<h5 class="text-end">{{ $post->fecha }}</h5>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->titulo }}</h5>
            <p class="card-text">{{ $post->body }}</p>
        </div>
    </div>
@endforeach
</div>
