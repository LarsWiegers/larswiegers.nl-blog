<?php

namespace App\Modules\Blog\Application\Controllers\Backend;

use App\Modules\Blog\Domain\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BackendTemplatesController extends Controller
{

	private $viewPath = 'Blog::backend.templates.';
	private $routePath = 'backend.templates.';



    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
	    return view($this->viewPath . 'home',[
	    	'templates' => Template::all(),
		    'request' => $request]);
    }

	/**
	 * Create the specified resource.
	 *
	 * @param  int
	 */
	public function create(Request $request)
	{
		return view( $this->viewPath . 'create-edit',[
			'type' => 'create',
			'template' => new Template(),
			'paths' => Template::getPaths()
		]);
	}

	/**
	 * store the specified resource.
	 *
	 * @param  int
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'title' => 'required|unique:templates,id|max:255',
			'path' => 'required|unique:templates|max:255'
		]);

		if ($validator->fails()) {
			return redirect()->back()
			                 ->withErrors($validator)
			                 ->withInput();
		}

		Template::create([
			'title' => $request->get('title'),
			'path' => '' . $request->get('path')
		]);

		return redirect(route($this->routePath . 'index'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Request $request
	 * @param $postId
	 *
	 */
	public function edit(Request $request, $templateId)
	{
		return view( $this->viewPath . 'create-edit',[
			'type' => 'edit',
			'viewPath' => $this->viewPath,
			'template' => Template::findOrFail($templateId),
			'paths' => Template::getPaths(),
			'request' => $request]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param $post
	 *
	 */
	public function update(Request $request, $template)
	{
		$template = Template::findOrFail((int) $template);

		$validator = $validator = Validator::make($request->all(), [
			'title' => 'required|unique:templates,id|max:255',
			'path' => 'required|unique:templates,id|max:255'
		]);

		if ($validator->fails()) {
			return redirect()->back()
			                 ->withErrors($validator)
			                 ->withInput();
		}

		$template->fill($request->all());
		$template->save();

		return redirect(route($this->routePath . 'index'));
	}

	/**
	 * Remove the specified resource from storage.
	 * @throws \Exception
	 */
	public function destroy($templateId)
	{
		Template::destroy($templateId);
		return back();
	}
}
