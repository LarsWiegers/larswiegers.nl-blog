<?php

namespace App\Modules\Backend\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

	public function index() {

		$user               = Auth::user();
		$instagramFollowers = ( ! is_null( $user->instagramAccount )
			? $this->getInstagramFollowers( $user->instagramAccount )
			: "U hebt nog geen instagram account gekoppeld doe dit bij het profiel" );
		$instagramUrl       = "https://www.instagram.com/" . $user->instagramAccount . "/";

		$youtubeSubscribers = ( ! is_null( $user->youtubeAccount )
			? $this->getYoutubeSubscribers( $user->youtubeAccount )
			: "U hebt nog geen youtube account gekoppeld doe dit bij het profiel" );
		$youtubeUrl         = "https://www.youtube.com/c/" . $user->youtubeAccount;

		$twitterFollowers = ( ! is_null( $user->twitterAccount )
			? $this->getTwitterFollowers( $user->twitterAccount )
			: "U hebt nog geen youtube account gekoppeld doe dit bij het profiel" );
		$twitterUrl       = "https://www.twitter.com/" . $user->twitterAccount;

		return view( 'Backend::home', [
			"instagramFollowers" => $instagramFollowers,
			'instagramUrl'       => $instagramUrl,
			"youtubeSubscribers" => $youtubeSubscribers,
			'youtubeUrl'         => $youtubeUrl,
			"twitterFollowers"   => $twitterFollowers,
			'twitterUrl'         => $twitterUrl
		] );
	}
}