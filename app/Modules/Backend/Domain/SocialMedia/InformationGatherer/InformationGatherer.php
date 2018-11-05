<?php
/**
 * Created by PhpStorm.
 * User: lars
 * Date: 5-11-18
 * Time: 17:09
 */

namespace App\Modules\Backend\Domain\SocialMedia\InformationGatherer;


interface InformationGatherer {
	public function gather();
}