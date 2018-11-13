<?php

namespace App\Modules\Blog\Application\Controllers\Backend;

use App\Modules\Blog\Domain\Category;
use App\Modules\Blog\Domain\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class BackendWebPostController extends Controller
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
	    return view('Blog::backend.home',[
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
    public function show(int $postId)
    {
        $post = Post::findOrFail($postId);
        return view('Blog::backend.show', ['post' => $post]);
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Post $post
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Post $post)
	{
		return view('Blog::backend.edit', ['post' => $post]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Post $post)
	{
		return view('Blog::backend.show', ['post' => $post]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy(Post $post)
	{
		$post->delete();
	}
}
