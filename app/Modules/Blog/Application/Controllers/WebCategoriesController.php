<?php

namespace App\Modules\Blog\Application\Controllers;

use App\Modules\Blog\Domain\Category;
use App\Modules\Blog\Domain\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class WebCategoriesController extends Controller
{

	/**
	 *
	 * Show the categories index.
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Request $request)
    {
	    $categories = Category::all();
	    $posts = Post::getLatest(15);
	    return view('Blog::pages.home',['posts' => $posts, 'categories' => $categories,'request' => $request]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, string $slug)
    {
        $category = Category::where('slug', '=', $slug)->get()->first();
        if(!$category) {
	        abort(404);
        }
        $posts = $category->posts;
        return view('Blog::pages.categories.show', [
        	'category' => $category,
	        'posts' => $posts,
	        'request' => $request,
	        'categories' => Category::all()
        ]);
    }
}
