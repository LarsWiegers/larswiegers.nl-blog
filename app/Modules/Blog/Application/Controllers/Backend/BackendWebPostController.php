<?php

namespace App\Modules\Blog\Application\Controllers\Backend;

use App\Modules\Blog\Domain\Category;
use App\Modules\Blog\Domain\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BackendWebPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    	if($request->get('category') !== null) {

    		$category = Category::find($request->get('category'));
    		$posts = $category->posts;

	    }else {
		    $category = null;
		    $posts = Post::all();
	    }
	    return view('Blog::backend.posts.home',[
	    	'posts' => $posts,
		    'category' => $category,
		    'request' => $request]);
    }

	/**
	 * Create the specified resource.
	 *
	 * @param  int
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{
		if($request->get('category') !== null) {

		$category = Category::find($request->get('category'));

		}else {
			$category = null;
		}

		return view('Blog::backend.posts.create',[
			'category' => $category,
			'categories' => Category::all()
		]);
	}

	/**
	 * store the specified resource.
	 *
	 * @param  int
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'title' => 'required|unique:posts|max:255',
			'content' => 'required',
			'category' => 'nullable',
		]);

		if ($validator->fails()) {
			return redirect()->back()
			                 ->withErrors($validator)
			                 ->withInput();
		}


		$slug = $request->get('slug') !== null ? $request->get('slug') :
			str_slug($request->get('title'));


		Post::create([
			'title' => $request->get('title'),
			'content' => $request->get('content'),
			'slug' => $slug,
			'author_id' => Auth::id(),
			'category_id' => $request->get('category')
		]);

		return redirect(route('categories.index'));
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
	public function edit(Request $request, $postId)
	{
		return view('Blog::backend.posts.edit', [
			'categories' => Category::all(),
			'request' => $request,
			'post' => Post::findOrFail($postId)]);
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
