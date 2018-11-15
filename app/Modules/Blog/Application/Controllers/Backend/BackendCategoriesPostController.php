<?php

namespace App\Modules\Blog\Application\Controllers\Backend;

use App\Modules\Blog\Domain\Category;
use App\Modules\Blog\Domain\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class BackendCategoriesPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $categories = Category::withoutGlobalScopes()->get();

	    return view('Blog::backend.categories.home',[
		    'categories' => $categories]);
    }

	/**
	 * Create the specified resource.
	 *
	 * @param  int
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('Blog::backend.categories.create');
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
			'title' => 'required|unique:categories|max:255',
			'description' => 'required',
			'slug' => 'nullable',
		]);

		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}


		$slug = ($request->get('slug') !== '' ||
		         $request->get('slug') !== null)
			? $request->get('slug')
			: str_slug($request->get('slug'));


		Category::create([
			'title' => $request->get('title'),
			'description' => $request->get('description'),
			'slug' => str_slug($request->get('title'), '-')
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
