@extends('layouts.app')

@section('content')
    <h2>チュートリアル</h2>
    <div class="row mb-4">
        @if(count($guidelines)>0)
            @include ('articles.article')
        @endif
    </div>

@endsection