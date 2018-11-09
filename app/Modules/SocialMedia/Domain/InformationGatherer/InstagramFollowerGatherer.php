<?php

namespace App\Modules\SocialMedia\Domain\InformationGatherer;


use App\Modules\SocialMedia\Domain\SocialMediaAccount;
use App\Modules\User\Domain\Helpers\HttpResponseCodeHelper;

class InstagramFollowerGatherer implements InformationGatherer {

	private $account;

	public function __construct(SocialMediaAccount $account) {
		$this->account = $account;
	}

	/**
	 * @return bool|string
	 * @throws \Exception
	 */
	public function gather() {
		if ( HttpResponseCodeHelper::get($this->account->getUrl() ) != 200 ) {
			throw new \Exception('This page does not exist!');
		}
		$response = file_get_contents( $this->account->getUrl() );

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