<?php

namespace App\Modules\Contact\Application\Controllers\Backend;

use App\Modules\Blog\Domain\Category;
use App\Modules\Contact\Domain\ContactMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendContactController extends Controller
{
	private $viewPath = 'Contact::backend.messages.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $messages = ContactMessage::all();

	    return view( $this->viewPath . 'home',[
		    'messages' => $messages]);
    }

    /**
     * Display the specified resource.
     *
     * @param ContactMessage $message
     * @return \Illuminate\Http\Response
     */
    public function show(ContactMessage $message)
    {
        return view($this->viewPath . 'create-edit-show', [
            'contactMessage' => $message,
            'type' => 'show']);
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
}
