<?php
/**
 * Created by PhpStorm.
 * User: lars
 * Date: 5-11-18
 * Time: 17:11
 */

namespace App\Modules\SocialMedia\Domain\InformationGatherer;


use App\Modules\SocialMedia\Domain\InformationGatherer\InformationGatherer;
use App\Modules\SocialMedia\Domain\SocialMediaAccount;

class YoutubeSubscriberGatherer implements InformationGatherer {

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
			if ( str_contains( $word, '<span class="yt-subscription-button-subscriber-count-branded-horizontal subscribed yt-uix-tooltip" title=' ) ) {
				$endResult = str_replace( '<span class="channel-header-subscription-button-container yt-uix-button-subscription-container with-preferences" ><button class="yt-uix-button yt-uix-button-size-default yt-uix-button-subscribe-branded yt-uix-button-has-icon no-icon-markup yt-uix-subscription-button yt-can-buffer" type="button" onclick="return false;" aria-role="button" aria-busy="false" aria-live="polite" data-channel-external-id="UCBa659QWEk1AI4Tg--mrJ2A" data-style-type="branded" data-href="https://accounts.google.com/ServiceLogin?passive=true&amp;continue=http%3A%2F%2Fwww.youtube.com%2Fsignin%3Fhl%3Dnl%26continue_action%3DQUFFLUhqbmM4cFRkTDVMQnl2a1hfZ08yTzlONjRDd0Z4QXxBQ3Jtc0tuX2tTbzFWZWpKc1dzUjY2MWc4TVNycmZ2VU9sV19adWY4blJjVThKNnpvRGw2dTVOYWNwQnhhWGI2SWpVOUdaanphU19lLWM1aEFpUTBfZzR1SkN0a2JsQlQtOU5Sc3o0UHhUNmZEQ3Jwc0laaWh0SVpMdzZ4ZlVTTm15NzJnTzRSenhUWi03YUFVQmN6RXdNMk9SdFdMUEJoTFdPQXR1ai14cHFSMzJDemRUTDFCNWtKYk5vRko3dmR0ajBuVFJBYjd0Z3Y%253D%26next%3D%252Fchannel%252FUCBa659QWEk1AI4Tg--mrJ2A%26action_handle_signin%3Dtrue%26app%3Ddesktop%26feature%3Dsubscribe&amp;uilel=3&amp;service=youtube&amp;hl=nl" data-clicktracking="ei=gex-WYuEDdmk1gK57qwQ&amp;feature=channels4&amp;ved=CJoDEJsrIhMIy8iaoo-z1QIVWZJVCh05NwsCKJsc"><span class="yt-uix-button-content"><span class="subscribe-label" aria-label="Abonneren">Abonneren</span><span class="subscribed-label" aria-label="Afmelden">Geabonneerd</span><span class="unsubscribe-label" aria-label="Afmelden">Afmelden</span></span></button><button class="yt-uix-button yt-uix-button-size-default yt-uix-button-default yt-uix-button-empty yt-uix-button-has-icon yt-uix-subscription-preferences-button" type="button" onclick="return false;" aria-label="Abonnementsvoorkeuren" aria-role="button" aria-busy="false" aria-live="polite" data-channel-external-id="UCBa659QWEk1AI4Tg--mrJ2A"><span class="yt-uix-button-icon-wrapper"><span class="yt-uix-button-icon yt-uix-button-icon-subscription-preferences yt-sprite"></span></span></button><span class="yt-subscription-button-subscriber-count-branded-horizontal subscribed yt-uix-tooltip" title="', "", $word );
				$word      = explode( '<span class="yt-subscription-button-subscriber-count-branded-horizontal subscribed yt-uix-tooltip" title="', $word );
				for ( $i = 0; $i < strlen( $word[1] ); $i ++ ) {
					if ( $word[1][ $i ] === '"' ) {
						$youtubeSubscribers = substr( "" . $word[1], 0, $i );
						return $youtubeSubscribers;
					}
				}
			}
		}
	}
}