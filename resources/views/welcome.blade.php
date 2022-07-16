@extends('layouts.app')

@section('content')

    @if (Auth::check())
    
   
        <form action="{{ route('search.index') }}" method="GET" class='input-group mb-4'>
            <input type="text" name="keyword" class="form-control">
            <input type="submit" value="検索" class="btn btn-default">
        </form>
        <div class="mb-4">
            <h2 class="text-2xl mb-4">新規投稿</h2>
        
            <div class='flex flex-wrap ml-4'>
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
            <div>
                <div class="bg-light">
                    <h2 class="pl-4 pt-4">{{ $top_view->title }}</h2>
                    <h6 class="pl-4">{{ $top_view->user->name }}</h6>
                    
                    <div class="ql-editor p-4">{!!$top_view->content !!}</div>
                </div>
            </div>
            @endif
        </div>
        
        

    @else
        <div class="text-center">
            <h1 class="text-secondary">LWTWikipedia</h1>
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    @endif
@endsection