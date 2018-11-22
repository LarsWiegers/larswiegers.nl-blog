<?php

namespace App\Modules\Blog\Application\Controllers;

use App\Modules\Blog\Domain\Category;
use App\Modules\Blog\Domain\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ApiPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
	    $posts = Post::public()->get();
	    return $posts;
    }

	/**
	 * Display the specified resource.
	 *
	 * @param $slug
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function show($categorySlug)
    {
    	if($categorySlug == 'all') {
    		return redirect(route('blog.api.posts.index'));
	    }

	    $category = Category::where('slug', '=', $categorySlug)->public()->get()->first();
	    if(!$category) {
		    return response()->json([ 'error' => 404, 'message' => 'Not found'], 400);
	    }

	    return $category->posts;
    }
}
