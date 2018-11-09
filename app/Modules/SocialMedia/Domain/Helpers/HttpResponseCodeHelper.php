<?php

namespace App\Modules\SocialMedia\Domain\Helpers;

class HttpResponseCodeHelper {
	/**
	 *  Returns the received HTTP Response code for the given url
	 *
	 * @param string $url
	 *
	 * @return int
	 */
	static function get(string $url ) : int {
		try {
			$headers = get_headers( $url );
		}catch(\ErrorException $e) {
			return 404;
		}

		return substr( $headers[0], 9, 3 );
	}
}