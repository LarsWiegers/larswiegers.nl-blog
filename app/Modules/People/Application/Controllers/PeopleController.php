<?php

namespace App\Modules\People\Application\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\People\Domain\Person;
use App\Modules\People\Application\Requests\SavePersonRequest;
class PeopleController extends Controller {

	public function index() {
		return view( 'People::index', ['people' => Person::all()]);
	}
	
	public function save(SavePersonRequest $request) {
		if($request->has('id')) {
			$person = Person::fill($request->validated());
			$person->save();
		}else {
			$person = Person::create($request->validated());
		}
		return response()->json([$person]);
	}
}
