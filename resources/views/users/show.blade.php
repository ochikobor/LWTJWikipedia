@extends('layouts.app')

@section('content')

@if (count($articles) > 0)
        @foreach ($articles as $article)
            <div class="list-group-item">
                <h2>{{$article->title}}</h2>
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

@endsection


