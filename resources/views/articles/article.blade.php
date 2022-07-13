
@foreach ($articles as $article)
<div class="col-md-3">
    <a href="{{ route('articles.show', ['article'=>$article->id]) }}">
    <div class='card mb-2'>
        <div class="ratio ratio-16x9 bg-light">
            <img src='...' alt="{{$article->thumbnail}}" class='card-img-top img-thumbnail '>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $article->category }}</p>
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="card-text text-right">{{ $article->user->name }}</p>
        </div>
    </div>
    </a>
</div>
@endforeach
