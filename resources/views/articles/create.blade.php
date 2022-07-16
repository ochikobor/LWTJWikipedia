@extends('layouts.app')

@section('content')
        {!! Form::model($article, ['route' => 'articles.store', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group mb-4">
                {!! Form::label('category', 'カテゴリー')!!}
                {{ Form::select('category',$category, old('category'), ['class' => 'form-control']) }}
            </div>
            <div class="form-group mb-4">
                {!! Form::label('title', 'タイトル')!!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <!--<div class="form-group mb-4">
                {!! Form::label('title', 'サムネイル')!!}
                {!! Form::file('thumbnail', null, ['class' => 'form-control']) !!}
            </div>-->

            <div id="editor" class="mb-4"></div>
            @include('commons.editor')
        
        {!! Form::submit('登録', ['class' => 'text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800']) !!}
        {!! Form::close() !!}
@endsection