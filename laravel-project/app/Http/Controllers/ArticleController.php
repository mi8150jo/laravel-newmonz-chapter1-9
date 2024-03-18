<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        $data = ['articles' => $articles];
        return view('articles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Articleインスタンスをあらかじめ用意
        // フォームの入れ物？
        $article = new Article();
        // ビューに渡す連想配列$data
        $data = ['article' => $article];
        // articles/create.blade.phpを使用する
        // スラッシュでも区切れるしドットでも区切れる
        return view('articles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーション＝値の検証
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        // Laravel特有のSQL記述
        $article = new Article;
        // コントローラーは名前空間が異なるので絶対パスで最上位から指定する必要がある
        $article -> user_id = \Auth::id();
        $article -> title = $request -> title;
        $article -> body = $request -> body;
        $article -> save();

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $data = ['article' => $article];
        return view('articles.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $this->authorize($article);
        $data = ['article' => $article];
        return view('articles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $this->authorize($article);
        // バリデーション＝値の検証
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        // Laravel特有のSQL記述¥
        $article -> title = $request -> title;
        $article -> body = $request -> body;
        $article -> save();

        return redirect(route('articles.show', $article));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->authorize($article);
        $article->delete();
        return redirect(route('articles.index'));
    }

    public function bookmark_articles()
    {
        // 一定の数で取得件数を区切って、複数ページにまたがってデータの取得や表示を行うこれをページネーションという
        $articles = \Auth::user()->bookmark_articles()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'articles' => $articles,
        ];
        return view('articles.bookmarks', $data);
    }

}
