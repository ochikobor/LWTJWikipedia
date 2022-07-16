@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="mb-4">
            <h4 class="badge badge-pill mb-2
            @if($article->category === 'guideline')
            badge-primary
                @else
                badge-secondary
            @endif
            ">{{ $article->category }}</h4>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $article->title }}</h5>
            <a href="{{ route('users.show',[$article->user]) }}" class="badge badge-light mb-2">{{$article->user->name }}</a>
            <h6 class="mb-2 font-normal text-gray-700 dark:text-gray-400">{{ $article->created_at }}</h6>
        </div>
    
        <div class="ql-editor">
            <div>{!!$article->content !!}</div>
        </div>
        
        @if(($article->category == 'tutorial')||(\Auth::id() === $article->user_id))
            <div class="w-full py-4">
                <div class="inline-flex">
                    {{--編集--}}
                    {!! link_to_route('articles.edit', '編集', ['article' => $article->id], ['class' => 'text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800']) !!}
                    {{--削除--}}
                    {!! Form::model($article, ['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                    @if (Auth::id() == $article->user_id)
                        {{-- 投稿削除ボタンのフォーム --}}
                        {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900']) !!}
                        {!! Form::close() !!}
                    @endif
                    {!! Form::close() !!}
                </div>
            
            </div>
        @endif
        
        <div class="list-group">
            <h2 class="text-2xl mb-4">編集履歴</h2>
            @if (empty($article->backups))
            @else
                @foreach ($article->backups as $backup)
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                    <h2 id="accordion-flush-heading-{{$loop->index + '1'}}">
                    <button type="button" class="flex items-center justify-between w-full py-2 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-{{$loop->index + '1'}}" aria-expanded="false" aria-controls="accordion-flush-body-{{$loop->index + '1'}}">
                        <p class="pl-4 w-1/8">{{$loop->index + '1'}}</p>
                        <div class="w-3/4 items-left">
                            <p class="mb-1 text-gray-500 dark:text-gray-400">{{$backup->user->name}}</p>
                            <p class="text-gray-500 dark:text-gray-400">{{$backup->created_at}}</p>
                        </div>
                        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                  </h2>
                  <div id="accordion-flush-body-{{$loop->index + '1'}}" class="hidden" aria-labelledby="accordion-flush-heading-{{$loop->index + '1'}}">
                    <div class="py-2 font-light border-b border-gray-200 dark:border-gray-700">
                        <h2 class="pl-4 pt-4">{{ $backup->title }}</h2>
                        <div class="ql-editor p-4">{!! $backup->content !!}</div>
                    </div>
                </div>
                </div>
                @endforeach
            @endif        
        </div>
    @endif
@endsection