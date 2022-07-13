@extends('layouts.app')

@section('content')
    <h2>チュートリアル</h2>
    <div class="row mb-4">
        @if(count($guidelines)>0)
            @foreach ($guidelines as $article)
                @include ('articles.article')
            @endforeach 
        @endif
    </div>

@endsection