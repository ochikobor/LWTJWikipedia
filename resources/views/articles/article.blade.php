<div class="card col-md-3 m-1">
    <div class="card-body">
        <p class="card-subtitle mb-2">{{ $article->category }}</p>
        <h5 class="card-title">{{ $article->title }}</h5>
        <a class="card-text mr-4" href="{{ route('users.show',[$article->user]) }}">{{$article->user->name }}</a>
        <a href="{{ route('articles.show', ['article'=>$article->id]) }}">詳細</a>
    </div>
</div>