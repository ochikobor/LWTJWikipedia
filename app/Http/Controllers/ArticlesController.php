<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $data = [];
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        $view = Article::orderBy('view_count', 'desc')->first();

        $data = [
            'articles' => $articles,
            'top_view' => $view,
        ];
        // 記事一覧ビューでそれを表示
        return view('welcome', $data);
    }
    
    public function create()
    {
        $article = new Article;
        $category = [
                    ''      => '選択してください' ,
                    'guideline' => 'guideline' ,
                    'tutorial'   => 'tutorial' ,
                    ];

        // 記事作成ビューを表示
        return view('articles.create', [
            'article' => $article,
            'category' => $category,
        ]);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:15',
            'category' => 'required',
            'thumbnail' => 'required',
            'content' => 'required',
        ]);

        //$file->storeAs('/', $file_name, 's3');
        // 記事を作成
        $request->user()->articles()->create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'thumbnail' => $request->thumbnail,
        ]);

        // トップページへリダイレクトさせる
        return redirect('/');

    }

    // getでarticles/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $article->view_count += 1;
        $article->save();
        
        // 記事詳細ビューでそれを表示
        return view('articles.show', [
            'article' => $article,
        ]);
    }

    // getでarticles/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値で記事を検索して取得
        $article = Article::findOrFail($id);

        // 記事編集ビューでそれを表示
        return view('articles.edit', [
            'article' => $article,
        ]);
    }

    // putまたはpatchでarticles/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
          // バリデーション
        $request->validate([
            'title' => 'required|max:15',   
        ]);
        
        // idの値で記事を検索して取得
        $article = Article::findOrFail($id);
        
        // 記事を更新
        $article->title = $request->title; 
        $article->content = $request->content;
        $article->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // deleteでarticles/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値で記事を検索して取得
        $article = Article::findOrFail($id);
        // 記事を削除
        if (\Auth::id() === $article->user_id) {
            $article->delete();
        }

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}