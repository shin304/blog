<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Contracts\Session\Session;
use App\Http\Requests\BlogRequest;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * ブログ一覧を表示
 * @return view 
 */
class BlogController extends Controller
{
    public function showList()
    {
        // $blogs = Blog::orderBy('id', 'desc')->get();
        // $blogs = Blog::all()->sortByDesc('id');
        $blogs = Blog::paginate(10);

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
        // Session()->flush();
        // redirect()->with();
        
        if (is_null($blog)) {
            \Session::flash('err_msg', 'データがありません');
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
    public function storeBlog(BlogRequest $request)
    {
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            // ブログを登録
            Blog::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollBack();
            abort(500);
        }

        \Session::flash('success_msg', 'ブログを登録しました');

        return redirect(route('blogs'));
    }

    /**
     * ブログの編集画面を表示
     * @param int $id
     * @return view
     */
    public function showEdit($id)
    {
        $blog = Blog::find($id);
        // Session()->flush();
        // redirect()->with();
        
        if (is_null($blog)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('blogs'));
        } else {
            return view('blog.edit', compact('blog'));
        }
    }

    /**
     * ブログ更新処理
     * 
     * @return view
     */
    public function exeUpdate(BlogRequest $request)
    {
        $inputs = $request->all();

        // dd($inputs);

        \DB::beginTransaction();
        try {
            // ブログを更新
            $blog = Blog::find($inputs['id']);
            $blog->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content'],
            ]);
            $blog->save();
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollBack();
            abort(500);
        }

        \Session::flash('success_msg', 'ブログを更新しました');

        return redirect(route('blogs'));
    }

    /**
     * ブログの削除処理
     * @param int $id
     * @return view
     */
    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        Blog::destroy($id);

        if (empty($blog)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('blogs'));
        } else {
            \Session::flash('success_msg', '削除しました');
            return redirect(route('blogs'));
        }
    }
}
