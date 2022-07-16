@if (count($errors) > 0)
    <div class="pl-8 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        @foreach ($errors->all() as $error)
            <li class="font-medium">{{ $error }}</li>
        @endforeach
    </div>
@endif
