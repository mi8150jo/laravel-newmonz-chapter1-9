<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function index(){
        $articles = \Auth::user()->articles()->orderBy('created_at', 'desc')->paginate(10);
        // \Auth::user()・・・ログインユーザーのインスタンス
        // articles()・・・そのユーザーが投稿したArticleインスタンス
        // orderBy('created_at')・・・投稿日時降順
        // get()・・・対象をコレクション型で取得
        // コレクション型は複数のオブジェクトを配列のようにまとめて扱える
        $data = [
            'articles' => $articles,
        ];
        return view('home', $data);
    }
}
