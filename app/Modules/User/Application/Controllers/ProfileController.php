<?php

namespace App\Modules\User\Application\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\SocialMedia\Domain\Helpers\HttpResponseCodeHelper;
use App\Modules\SocialMedia\Domain\SocialMediaAccount;
use App\Modules\SocialMedia\Domain\SocialMediaType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('User::profile');
	}

	/**
	 * Save the users profile.
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function save(Request $request)
	{

		$request->validate([
			'twitterUrl' => 'url|nullable',
			'instagramUrl' => 'url|nullable',
			'youtubeUrl' => 'url|nullable',
		]);

		$codeHelper = new HttpResponseCodeHelper();

		$errors = [];

		if( $request->get('twitterUrl') != null &&
			$codeHelper->get($request->get('twitterUrl')) !== 200) {
			$errors['twitterUrl'] = 'The link provided does not exist!';
		}
		if( $request->get('instagramUrl') != null &&
			$codeHelper->get($request->get('instagramUrl')) !== 200) {
			$errors['instagramUrl'] = 'The link provided does not exist!';
		}
		if( $request->get('youtubeUrl') != null &&
			$codeHelper->get($request->get('youtubeUrl')) !== 200) {
			$errors['youtubeUrl'] = 'The link provided does not exist!';
		}
		if(sizeof($errors)) {
			return Redirect::back()->withInput()->withErrors($errors);
		}
		$twitter = SocialMediaType::where('name', '=', 'Twitter')->get()->first();
		$instagram = SocialMediaType::where('name', '=', 'Instagram')->get()->first();
		$youtube = SocialMediaType::where('name', '=', 'Youtube')->get()->first();
		if( $request->get('twitterUrl') != null) {
			SocialMediaAccount::updateOrCreate(
				['type_id' => $twitter->id, 'user_id' => Auth::id()],
				[
					'url' => $request->get('twitterUrl'),
					'type_id' => $twitter->id,
					'user_id' => Auth::id()
				]);
		}

		if( $request->get('instagramUrl') != null) {
			SocialMediaAccount::updateOrCreate(
				['type_id' => $instagram->id, 'user_id' => Auth::id()],
				[
					'url' => $request->get('instagramUrl'),
					'type_id' => $twitter->id,
					'user_id' => Auth::id()
				]);
		}

		if( $request->get('youtubeUrl') != null) {
			SocialMediaAccount::updateOrCreate(
				['type_id' => $youtube->id, 'user_id' => Auth::id()],
				[
					'url' => $request->get('youtubeUrl'),
					'type_id' => $twitter->id,
					'user_id' => Auth::id()
				]);
		}



		return Redirect(route('backend-home'));

	}
}
