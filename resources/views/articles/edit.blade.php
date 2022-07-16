@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="form-group mb-4">
            {!! Form::model($article,  ['route' => ['articles.update', $article->id], 'method' => 'put']) !!}

                <div class="form-group mb-4">
                    {!! Form::label('title', 'タイトル')!!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <!--<div class="form-group mb-4">
                    {!! Form::label('title', 'サムネイル')!!}
                    {!! Form::file('thumbnail', null, ['class' => 'form-control']) !!}
                </div>
                -->

                <div id="editor" class="mb-4">{!! $article->content !!}</div>
                
                @include('commons.editor')
                <input type="hidden" name="id" value="{{ $article->id }}">
                {!! Form::submit('登録', ['class' => 'text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800']) !!}

            {!! Form::close() !!}
        </div>
    @endif
@endsection