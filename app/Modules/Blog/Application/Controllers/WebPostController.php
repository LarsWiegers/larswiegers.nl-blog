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
	    foreach ($posts as $post ) {
	        $post->content = str_limit($post->content, $limit = 100, $end = '...');
        }
	    return view('Blog::pages.home',['posts' => $posts, 'categories' => $categories,'request' => $request]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function show(int $postId)
    {
        $post = Post::findOrFail($postId);
        return view('Blog::pages.show', ['post' => $post]);
    }
}
