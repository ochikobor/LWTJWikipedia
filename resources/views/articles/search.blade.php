@extends('layouts.app')

@section('content')

    <h2 class="mb-4">検索結果</h2>
    <div class="list-group">
        @if(count($search)>0)
            @foreach ($search as $search)
            <div class="list-group-item">
                <h4 class="badge badge-pill 
                    @if($search->category === 'guideline')
                    badge-primary
                        @else
                        badge-secondary
                    @endif
                ">{{ $search->category }}</h4>
                <h2>{{ $search->title }}</h2>
                
                <div style="display: flex; ">
                    {{--編集--}}
                    {!! link_to_route('articles.show', '詳細', ['article' => $search->id], ['class' => 'btn btn-secondary mr-2']) !!}
                </div>
            </div>
             @endforeach
        @else
            <h2>見つかりませんでした</h2>
        @endif
    </div>
@endsection