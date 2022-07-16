@extends('layouts.app')

@section('content')
    @if(Auth::check())
    <h2 class="text-2xl mb-4">チュートリアル</h2>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5">
        @if(count($tutorials)>0)
            @foreach ($tutorials as $article)
                @include ('articles.article')
            @endforeach 
        @endif
    </div>
    @endif
@endsection