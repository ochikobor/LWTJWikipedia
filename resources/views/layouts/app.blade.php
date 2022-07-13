<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>LWTJWikipedia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    </head>

    <body>
        <header class="mb-4">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                {{-- トップページへのリンク --}}
                <a class="navbar-brand" href="/">LWTWikipedia</a>
        
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="nav-bar">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav">
                        @if (Auth::check())
                            <li class="nav-item">{!! link_to_route('select.guidelines', 'ガイドライン', [], ['class' => 'nav-link']) !!}</li>
                            <li class="nav-item">{!! link_to_route('select.tutorials', 'チュートリアル', [], ['class' => 'nav-link']) !!}</li>
                            <li class="nav-item">{!! link_to_route('articles.create', '新規作成', [], ['class' => 'nav-link']) !!}</li>
                            <li class="nav-item">{!! link_to_route('users.index', '投稿履歴', [], ['class' => 'nav-link']) !!}</li>
                            {{-- ログアウトへのリンク --}}
                            <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト', [],['class' => 'nav-link']) !!}</li>
                        @else
                            {{-- ユーザ登録ページへのリンク --}}
                            <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                            {{-- ログインページへのリンク --}}
                            <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                        @endif
                    </ul>
                </div>
            </nav>
        </header>
        
        {{-- エラーメッセージ --}}
            @include('commons.error')
        <div class="container">
            @yield('content')
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>