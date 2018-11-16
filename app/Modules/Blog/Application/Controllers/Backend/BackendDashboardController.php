<?php

namespace App\Modules\Blog\Application\Controllers\Backend;

use App\Modules\Blog\Domain\Category;
use App\Modules\Blog\Domain\Post;
use App\Http\Controllers\Controller;

class BackendDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $categories = Category::all();
	    $posts = Post::all();

	    return view('Blog::backend.dashboard.home',[
		    'categories' => $categories,
		    'posts' => $posts,
	    ]);
    }
}
