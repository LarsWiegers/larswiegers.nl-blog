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
	    return view('Contact::home');
    }


    public function save(Request $request) {

        ContactMessage::create([
           'name' => $request->get('name'),
           'email' => $request->get('email'),
           'text' => $request->get('text'),
        ]);

        return Redirect::back();

    }
}
