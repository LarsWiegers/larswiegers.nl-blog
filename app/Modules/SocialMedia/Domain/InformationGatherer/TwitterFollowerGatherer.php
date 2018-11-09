<?php

namespace App\Modules\SocialMedia\Domain\InformationGatherer;

use App\Modules\SocialMedia\Domain\SocialMediaAccount;

class TwitterFollowerGatherer implements InformationGatherer {

	private $account;

	public function __construct(SocialMediaAccount $account) {
		$this->account = $account;
	}

	/**
	 * @return bool|string
	 * @throws \Exception
	 */
	public function gather() {
		$response = file_get_contents( $this->account->getUrl() );
		$lines    = explode( PHP_EOL, $response );
		foreach ( $lines as $word ) {
			if ( str_contains( $word, 'data-nav="followers"' ) ) {
				$word = explode( '<a class="ProfileNav-stat ProfileNav-stat--link u-borderUserColor u-textCenter js-tooltip js-openSignupDialog js-nonNavigable u-textUserColor" title="', $word );
				for ( $i = 0; $i < strlen( $word[1] ); $i ++ ) {
					if ( $word[1][ $i ] === ' ' ) {
						$twitterFollowers = substr( "" . $word[1], 0, $i );

						return $twitterFollowers;
					}
				}
			}
		}
	}
}