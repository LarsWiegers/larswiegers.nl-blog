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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
	    $categories = Category::all();
	    $posts = Post::getLatest(15);
	    return view('Blog::pages.home',[
	    	'posts' => $posts,
		    'categories' => $categories,
		    'request' => $request]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function show(string $postSlug)
    {
	    $post = Post::where('slug', '=', $postSlug)->get()->first();
	    if(!$post) {
		    abort(404);
	    }
        return view('Blog::pages.posts.show', ['post' => $post]);
    }
}
