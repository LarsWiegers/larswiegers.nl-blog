<?php

namespace App\Modules\Blog\Application\Controllers;

use App\Modules\Blog\Domain\Category;
use App\Modules\Blog\Domain\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class WebPostController extends Controller
{
	/**
	 *
	 * Display latest posts
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Request $request)
    {
	    return view('Blog::pages.home',['request' => $request]);
    }

	/**
	 * Display the post when given the slug
	 *
	 * @param string $slug
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show(string $slug)
    {
	    $post = Post::where('slug', '=', $slug)->get()->first();
	    if(!$post) {
		    abort(404);
	    }
        return view('Blog::pages.posts.show', ['post' => $post]);
    }
}
