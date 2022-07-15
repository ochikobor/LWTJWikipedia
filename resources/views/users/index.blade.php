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
    <h2>投稿履歴</h2>
    @if (count($articles) > 0)
        @foreach ($articles as $article)
            <div class="list-group-item">
                <h4>{{$article->title}}</h4>
                <div style="display: flex; ">
                    {{--編集--}}
                    {!! link_to_route('articles.show', '詳細', ['article' => $article->id], ['class' => 'btn btn-secondary mr-2']) !!}
                    {{-- 投稿削除ボタンのフォーム --}}
                    {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}                    
                </div>
            </div>
        @endforeach
    @else
        <h2>投稿はありません</h2>
    @endif        
</div>



@endsection


