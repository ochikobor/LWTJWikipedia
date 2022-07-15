@extends('layouts.app')

@section('content')
    @if(Auth::check())
    <h2>チュートリアル</h2>
    <div class="row mb-4">
        @if(count($tutorials)>0)
            @foreach ($tutorials as $article)
                @include ('articles.article')
            @endforeach 
        @endif
    </div>
    @endif
@endsection