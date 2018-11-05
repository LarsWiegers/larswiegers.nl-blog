<?php

namespace App\Modules\Backend\Domain\SocialMedia\Helpers;

class HttpResponseCodeHelper {
	/**
	 *  Returns the received HTTP Response code for the given url
	 *
	 * @param string $url
	 *
	 * @return int
	 */
	static function get(string $url ) : int {
		$headers = get_headers( $url );

		return substr( $headers[0], 9, 3 );
	}
}