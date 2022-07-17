@extends('layouts.app')

@section('content')
<div class="row">
    <li class="col-md-2 card mb-4">
        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
        <img class="cart-img-top" src="{{ Gravatar::get($user->email, ['size' => 100]) }}" alt="">
        <div class="card-body">
            <text class="card-title">{{ $user->name }}</text>
        </div>
    </li>
</div>

<div class="list-group">
    <h2 class="text-2xl mb-4">投稿履歴</h2>
    @if (count($articles) > 0)
        @foreach ($articles as $article)
            <a href="{{ route('articles.show',['article' => $article->id])}}" class="block p-6 m-2 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h4 class="badge badge-pill 
                    @if($article->category === 'guideline')
                    badge-primary
                        @else
                        badge-secondary
                    @endif
                ">{{ $article->category }}</h4>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$article->title}}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{$article->created_at}}</p>
            </a>
        @endforeach
    @else
        <h2>投稿はありません</h2>
    @endif        
</div>



@endsection


