@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="form-group mb-4">
            {!! Form::model($article,  ['route' => ['articles.update', $article->id], 'method' => 'put']) !!}

                <div class="form-group mb-4">
                    {!! Form::label('title', 'タイトル')!!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
            
                <div id="editor" class="mb-4">{!! $article->content !!}</div>
                
                @include('commons.editor')
                <input type="hidden" name="id" value="{{ $article->id }}">
                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    @endif
@endsection