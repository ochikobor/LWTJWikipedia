<div class="m-2 bg-white h-auto rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">

    <div class="p-4">
        <h4 class="badge badge-pill mb-2
            @if($article->category === 'guideline')
            badge-primary
                @else
                badge-secondary
            @endif
        ">{{ $article->category }}</h4>
        <a href="#">
            <h5 class="mb-2 text-base font-bold tracking-tight text-gray-900 dark:text-white">{{ $article->title }}</h5>
        </a>
        <div class='flex justify-start my-2'>
            <div class="overflow-hidden relative w-5 h-5 bg-gray-100 rounded-full dark:bg-gray-600">
            <svg class="absolute text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
            </div>
            <a href="{{ route('users.show',[$article->user]) }}" class="text-sm pl-2">{{$article->user->name }}</a>
        </div>
        <a href="{{ route('articles.show', ['article'=>$article->id]) }}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            + More
            <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </div>
</div>