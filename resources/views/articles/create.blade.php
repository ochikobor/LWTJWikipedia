@extends('layouts.app')

@section('content')
        {!! Form::model($article, ['route' => 'articles.store']) !!}
            <div class="form-group mb-4">
                {!! Form::label('category', 'カテゴリー')!!}
                {{ Form::select('category',$category, old('category'), ['class' => 'my_class']) }}
            </div>
            <div class="form-group mb-4">
                {!! Form::label('title', 'タイトル')!!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group mb-4">
                {!! Form::label('thumbnail', 'サムネイル') !!}
                {!! Form::file('thumbnail', ['class' => 'form-control-file']) !!}
            </div>

            <div id="editor" class="mb-4"></div>
            @include('commons.editor')
        
        {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
@endsection