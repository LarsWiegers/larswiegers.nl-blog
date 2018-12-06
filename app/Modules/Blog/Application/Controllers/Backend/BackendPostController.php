<?php

namespace App\Modules\Blog\Application\Controllers\Backend;

use App\Modules\Blog\Domain\Category;
use App\Modules\Blog\Domain\Post;
use App\Modules\Blog\Domain\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BackendPostController extends Controller
{

	private $viewPath = 'Blog::backend.posts.';


	/**
	 * @param $request
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	private function validator($request) {
		return Validator::make($request->all(), [
		'title' => 'required|unique:posts,id|max:255',
		'content' => 'required',
		'category' => 'nullable',
		'slug' => 'nullable|unique:posts,id',
		'template_id' => 'required'
		]);
	}


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
	    return view($this->viewPath . 'home',[
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

		return view( $this->viewPath . 'create-edit',[
			'type' => 'create',
			'category' => $category,
			'post' => new Post(),
			'templates' => Template::all(),
			'template' => new Template(),
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
		$validator = $this->validator($request);

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
			'category_id' => $request->get('category_id')
		]);

		return redirect(route('backend.posts.index'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Request $request
	 * @param $postId
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $postId)
	{
		return view( $this->viewPath . 'create-edit',[
			'type' => 'edit',
			'viewPath' => $this->viewPath,
			'categories' => Category::all(),
			'category' => Post::findOrFail($postId)->category,
			'request' => $request,
			'templates' => Template::all(),
			'post' => Post::findOrFail($postId)]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param $post
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $post)
	{
		$post = Post::findOrFail((int) $post);

		$validator = $this->validator($request);

		if ($validator->fails()) {
			return redirect()->back()
			                 ->withErrors($validator)
			                 ->withInput();
		}


		$slug = $request->get('slug') !== null ?
			$request->get('slug') :
			str_slug($request->get('title'));

		$post->fill($request->all());
		$post->save();

		return redirect(route('backend.posts.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy($postId)
	{
		Post::destroy($postId);
		return back();
	}
}
