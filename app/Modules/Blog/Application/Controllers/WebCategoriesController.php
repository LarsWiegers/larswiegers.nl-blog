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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
    public function show(string $slug)
    {
        $category = Category::where('slug', '=', $slug)->get()->first();
        if(!$category) {
	        abort(404);
        }
        $posts = $category->posts;
        return view('Blog::pages.categories.show', ['category' => $category, 'posts' => $posts]);
    }
}
