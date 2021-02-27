<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Contracts\Session\Session;

/**
 * ブログ一覧を表示
 * 
 * @return view 
 */
class BlogController extends Controller
{
    public function showList()
    {
        $blogs = Blog::all();

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

        if (is_null($blog)) {
            return redirect(route('blogs'));
        } else {
            return view('blog.detail', compact('blog'));
        }
    }
}
