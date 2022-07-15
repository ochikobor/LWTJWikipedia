<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        // ユーザの投稿一覧を作成日時の降順で取得
        $user = \Auth::user();
        $articles = \Auth::user()->articles()->orderBy('created_at', 'desc')->paginate(10);
        return view('users.index', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        $articles = $user->articles()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }
}
