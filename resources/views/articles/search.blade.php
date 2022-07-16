@extends('layouts.app')

@section('content')

    <h2 class="text-2xl mb-4">検索結果</h2>
    <div class="list-group">
        @if(count($search)>0)
            @foreach ($search as $search)
            <a href="{{ route('articles.show',['article' => $search->id])}}" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h4 class="badge badge-pill 
                    @if($search->category === 'guideline')
                    badge-primary
                        @else
                        badge-secondary
                    @endif
                ">{{ $search->category }}</h4>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$search->title}}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{$search->created_at}}</p>
            </a>
             @endforeach
        @else
            <h2 class="text-2xl mb-4">見つかりませんでした</h2>
        @endif
    </div>
@endsection