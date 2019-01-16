<?php

namespace App\Modules\Contact\Application\Controllers;

use App\Modules\Contact\Domain\ContactMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WebContactController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
	    return view('Contact::home', ['contactMessage' => new ContactMessage]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'text' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $message = ContactMessage::create([
           'name' => $request->get('name'),
           'email' => $request->get('email'),
           'text' => $request->get('text'),
        ]);

        if($message->id == null) {
            return back()->with('message', ['message' => 'Something went wrong with saving your message.',
                'type' => 'failure']);
        }

        return back()->with('message', ['message' => 'We received the message!',
            'type' => 'success']);
    }
}
