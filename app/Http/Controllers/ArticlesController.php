<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Article;

use App\Backup;

use Storage;

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
            'category' => 'required',
            'title' => 'required|max:30',
        //    'thumbnail' => 'required',
            'content' => 'required',
        ]);

        //if($request->file('thumbnail')->isValid()) {
        //    $file = $request->file('thumbnail');
            //バケットに「test」フォルダを作っているとき
        //    $path = Storage::disk('s3')->put('/',$file, 'public');
        //}
        
        // 記事を作成
        $request->user()->articles()->create([
            'category' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
        //    'thumbnail' => $path,
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

        //$backups = Article::backups()->orderBy('created_at','desc');
        //dd($backups);
        
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
        
        if(($article->category == 'tutorial')||(\Auth::id() === $article->user_id)){
            return view('articles.edit', [
            'article' => $article,
        ]);}else{
            // トップページへリダイレクトさせる
            return redirect('/');
            
        }
    }

    // putまたはpatchでarticles/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
          // バリデーション
        $request->validate([
            'title' => 'required|max:15', 
            'content' => 'required',
        ]);
        // idの値で記事を検索して取得
        $article = Article::findOrFail($id);
        
        $backup = new Backup;
        $backup->title = $article->title;
        //$backup->thumbnail = $article->thumbnail;
        $backup->content = $article->content;
        $backup->article_id = $article->id;
        $backup->user_id = $article->user_id;
        $backup->save();
        
        // 記事を更新
        $article->title = $request->title; 
        $article->content = $request->content;
        //$article->thumbnail = $request->thumbnail;
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
