<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        // ユーザの投稿一覧を作成日時の降順で取得
        $user = \Auth::user();
        $articles = \Auth::user()->articles()->orderBy('created_at', 'desc')->paginate(10);
        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }
}
