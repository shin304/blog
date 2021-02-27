<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * ブログ一覧を表示
 * 
 * @return view 
 */
class BlogController extends Controller
{
    public function showList() {
        return view('blog.list');
    }
}
