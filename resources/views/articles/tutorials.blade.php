@extends('layouts.app')

@section('content')
    <h2>ガイドライン</h2>
    <div class="row mb-4">
        @if(count($tutorials)>0)
            @foreach ($tutorials as $article)
                @include ('articles.article')
            @endforeach 
        @endif
    </div>

@endsection