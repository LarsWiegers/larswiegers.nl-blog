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
	private $viewPath = 'Blog::backend.categories.';

	/**
	 * @param $request
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	private function validator($request) {
		return Validator::make($request->all(), [
			'title' => 'required|max:255',
			'description' => 'required',
			'slug' => 'nullable',
            'public' => 'integer'
		]);
	}

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
		return view( $this->viewPath . 'create-edit',[
			'type' => 'create',
			'model' => Category::class,
			'category' => new Category()
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
		$validator = $this->validator($request);

		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}

		Category::create($request->all());

		return redirect(route('backend.categories.index'));
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
		return view( $this->viewPath . 'create-edit',[
            'type' => 'edit',
            'model' => Category::class,
			'category' => Category::findOrFail($categoryId)
		]);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, int $categoryId)
	{
		$category = Category::findOrFail($categoryId);
		$validator = $this->validator($request);

		if ($validator->fails()) {
			return redirect()->back()
			                 ->withErrors($validator)
			                 ->withInput();
		}
		$category->fill($request->all());
		$category->save();

		return redirect(route('backend.categories.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy($category)
	{
		$category = Category::findOrFail($category);
		if(count($category->posts)) {
			foreach($category->posts as $post) {
				$post->category_id = null;
				$post->save();
			}
		}
		Category::destroy($category->id);
		return back();
	}
}
