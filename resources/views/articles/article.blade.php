<div class="card col-md-3 m-1">
    <div class="card-body">
        <h4 class="badge badge-pill badge-primary">{{ $article->category }}</h4>
        <h5 class="card-title">{{ $article->title }}</h5>
        <a href="{{ route('users.show',[$article->user]) }}" class="badge badge-light">{{$article->user->name }}</a>
        <div class="text-right">
            <a href="{{ route('articles.show', ['article'=>$article->id]) }}">+ 詳細</a>
        </div>
    </div>
</div>