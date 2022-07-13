<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class SelectController extends Controller
{
    public function guidelines()
    {
        $guidelines = Article::where('category','guideline')->get();
     
        $data = [
            'guidlines' => $guidelines,
        ];
        // 記事一覧ビューでそれを表示
        return view('articles.guidelines', $data);
    }
    
        public function tutorials()
    {
        $tutorials = Article::where('category','tutorial')->get();
        
        $data = [
            'tutorials' => $tutorials,
        ];
        // 記事一覧ビューでそれを表示
        return view('articles.tutorials', $data);
    }
}
