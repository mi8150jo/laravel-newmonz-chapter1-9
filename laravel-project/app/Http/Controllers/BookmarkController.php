<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    
    public function store($articleId) {
        $user = \Auth::user();
        // is_bookmarkメソッドですでに登録されているかチェック
        // この場合登録されていない時
        if (!$user->is_bookmark($articleId)) {
            // 多対多リレーションを定義したリソースはattach()メソッドで追加、detach()メソッドで削除することができる
            $user->bookmark_articles()->attach($articleId);
        }
        // 元のページに戻る
        return back();
    }
    public function destroy($articleId) {
        $user = \Auth::user();
        if ($user->is_bookmark($articleId)) {
            $user->bookmark_articles()->detach($articleId);
        }
        return back();
    }
}
