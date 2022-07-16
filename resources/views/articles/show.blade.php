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
            <h4 class="badge badge-pill mb-2
            @if($article->category === 'guideline')
            badge-primary
                @else
                badge-secondary
            @endif
            ">{{ $article->category }}</h4>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $article->title }}</h5>
            <a href="{{ route('users.show',[$article->user]) }}" class="badge badge-light mb-2">{{$article->user->name }}</a>
            <h6 class="mb-2 font-normal text-gray-700 dark:text-gray-400">{{ $article->created_at }}</h6>
        </div>
    
        <div class="ql-editor">
            <div>{!!$article->content !!}</div>
        </div>
        
        <div class="list-group">
            <h2 class="text-2xl mb-4">投稿履歴</h2>
            @if (empty($backups))
            @else
                @foreach ($backups as $backup)
                    <a class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$backup->title}}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{$backup->created_at}}</p>
                    </a>
                @endforeach
            @endif        
        </div>
    @endif
@endsection