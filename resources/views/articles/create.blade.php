@extends('layouts.app')

@section('content')
        {!! Form::model($article, ['route' => 'articles.store', 'enctype' => 'multipart/form-data'] ) !!}
            <div class="form-group mb-4">
                {!! Form::label('category', 'カテゴリー')!!}
                {{ Form::select('category',$category, old('category'), ['class' => 'form-control my_class']) }}
            </div>
            <div class="form-group mb-4">
                {!! Form::label('title', 'タイトル')!!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div id="editor" class="mb-4"></div>
            @include('commons.editor')
        
        {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
@endsection