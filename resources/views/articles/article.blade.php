<div class="card col-md-3 m-1">
    <div class="card-body">
        <p class="card-subtitle mb-2">{{ $article->category }}</p>
        <h5 class="card-title">{{ $article->title }}</h5>
        <p class="card-text">{{ $article->user->name }}</p>
        <a href="{{ route('articles.show', ['article'=>$article->id]) }}">+ more</a>
    </div>
</div>