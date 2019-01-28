<?php

namespace App\Modules\Projects\Application\Controllers;

use App\Modules\Contact\Domain\ContactMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use GrahamCampbell\GitHub\Facades\GitHub;

class WebProjectsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $client = new \Github\Client();
        $repositories = $client->api('user')->repositories('larswiegers');
        return view("Projects::home", ['repositories' => $repositories]);
    }
}
