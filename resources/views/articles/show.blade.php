@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @if(($article->category == 'tutorial')||(\Auth::id() === $article->user_id))
            <div class="form-inline mb-4">
                {{--編集--}}
                {!! link_to_route('articles.edit', '編集', ['article' => $article->id], ['class' => 'btn btn-secondary mr-2']) !!}
                {{--削除--}}
                {!! Form::model($article, ['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                @if (Auth::id() == $article->user_id)
                    {{-- 投稿削除ボタンのフォーム --}}
                    {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endif
                {!! Form::close() !!}
            </div>
        @endif
        <div class="mb-4">
            <h2>{{ $article->title }}</h2>
            <a class="card-text mr-4" href="{{ route('users.show',[$article->user]) }}">{{$article->user->name }}</a>
        </div>
    
        <div class="ql-editor">
            <div>{!!$article->content !!}</div>
        </div>
    @endif
@endsection