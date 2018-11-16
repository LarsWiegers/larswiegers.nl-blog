<?php

namespace App\Modules\Blog\Application\Controllers\Backend;

use App\Modules\Blog\Domain\Category;
use App\Modules\Blog\Domain\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class BackendCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $categories = Category::all();

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

		dd("hi");

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
    public function show(int $categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return redirect(route('backend.posts.index',['category' => $categoryId]));
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $postId
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit(int $categoryId)
	{
		return view('Blog::backend.categories.edit',
			['category' => Category::findOrFail($categoryId)]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, int $categoryId)
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

		$category = Category::findOrFail($categoryId);
		$category->title = $request->get('title');
		$category->description = $request->get('description');
		$category->slug = $slug;
		$category->save();

		return redirect(route('backend.categories.index'));
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
