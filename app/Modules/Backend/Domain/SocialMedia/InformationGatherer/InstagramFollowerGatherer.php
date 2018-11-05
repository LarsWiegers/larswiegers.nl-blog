<?php
/**
 * Created by PhpStorm.
 * User: lars
 * Date: 5-11-18
 * Time: 17:11
 */

namespace App\Modules\Backend\Domain\SocialMedia\InformationGatherer;


use App\Modules\Backend\Domain\SocialMedia\Helpers\HttpResponseCodeHelper;
use App\SocialMediaAccount;

class InstagramFollowerGatherer implements InformationGatherer {

	private $account;

	public function __construct(SocialMediaAccount $account) {
		$this->account = $account;
	}

	public function gather() {
		if ( HttpResponseCodeHelper::get($this->account->getUrl() ) != 200 ) {
			return "Het account dat u heeft toegevoegd kunnen wij niet vinden.";
		}
		$response = file_get_contents( "https://www.instagram.com/" . $account . "/" );

		$lines = explode( PHP_EOL, $response );

		foreach ( $lines as $word ) {
			if ( str_contains( "" . $word, "\"followed_by\": {\"count\": " ) ) {
				$word = explode( "\"followed_by\": {\"count\":", $word );
				$word = str_replace( "\"followed_by\": {\"count\":", "", $word );
				for ( $i = 0; $i < strlen( $word[1] ); $i ++ ) {
					if ( $word[1][ $i ] === "}" ) {
						$instagramFollowers = substr( "" . $word[1], 0, $i );
						$instagramFollowers = substr( $instagramFollowers, 1 );

						return $instagramFollowers;
					}
				}

			}
		}
	}
}