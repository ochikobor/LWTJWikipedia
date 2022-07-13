@extends('layouts.app')

@section('content')
    <h2>ガイドライン</h2>
    <div class="row mb-4">
        @if(count($tutorials)>0)
            @include ('articles.article')
        @endif
    </div>

@endsection