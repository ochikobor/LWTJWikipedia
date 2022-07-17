@extends('layouts.app')

@section('content')

    @if (Auth::check())
        <form class="flex items-center my-4" action="{{ route('search.index') }}" method="GET">   
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" name="keyword"  id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
            </div>
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
            </button>
        </form>
   
        <div class="mb-4">
            <h2 class="text-2xl mb-4">新規投稿</h2>
        
            <div class='grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5'>
                @if(count($articles)>0)
                        @foreach ($articles as $article)
                            @include ('articles.article')
                        @endforeach 
                    @else
                    <h4>投稿がありません</h2>
                @endif
            </div>
        </div>
        
        <div class="mb-4">
            <h4 class="text-2xl mb-4">注目記事</h4>
        
        @if(empty($top_view))
            <h4 class="text-xl">投稿はありません</h2>
            @else
            <div class="bg-light">
                <h2 class="pl-4 pt-4">{{ $top_view->title }}</h2>
                <h6 class="pl-4">{{ $top_view->user->name }}</h6>
                
                <div class="ql-editor">{!!$top_view->content !!}</div>
            </div>
            @endif
        </div>
        
        

    @else
        <div class="text-center">
            <h1 class="text-3xl my-4">LWTWikipedia</h1>
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800']) !!}
        </div>
    @endif
@endsection