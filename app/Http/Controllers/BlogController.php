<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Contracts\Session\Session;

/**
 * ブログ一覧を表示
 * @return view 
 */
class BlogController extends Controller
{
    public function showList()
    {
        // $blogs = Blog::orderBy('id', 'desc')->get();
        $blogs = Blog::all()->sortByDesc('id');

        return view('blog.list', compact('blogs'));
    }


    /**
     * ブログの詳細を表示
     * @param int $id
     * @return view
     */
    public function showDetal($id)
    {
        $blog = Blog::find($id);
        \Session::flash('err_msg', 'データがありません');
        // Session()->flush();
        // redirect()->with();

        if (!empty($blog)) {
            return redirect(route('blogs'));
        } else {
            return view('blog.detail', compact('blog'));
        }
    }

    /**
     * ブログ投稿画面
     */
    public function showCreate()
    {
        return view('blog.create');
    }

    /**
     * ブログ登録処理
     * 
     * @return view
     */
    public function storeBlog(Request $request)
    {
        $inputs = $request->all();
        Blog::create($inputs);
        \Session::flash('success_msg', 'ブログを登録しました');

        return redirect(route('blogs'));
    }
}
