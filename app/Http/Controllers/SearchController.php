<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class SearchController extends Controller
{
    public function index(Request $request)
    {   
        $request->validate([
            'keyword' => 'required',
        ]);


        $keyword = $request->input('keyword');
        $query = Article::query();
        
       // もし検索フォームにキーワードが入力されたら
        if ($keyword) {

            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($keyword, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);


            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('title', 'like', '%'.$value.'%');
                $query->where('content', 'like', '%'.$value.'%');
            }

            $search = $query->paginate(20);
        }
        
        return view('articles.search',['search' => $search]);
        
    }
}
