<?php

namespace App\Modules\SocialMedia\Domain\Commands;

use App\Modules\SocialMedia\Domain\InformationGatherer\TwitterFollowerGatherer;
use App\Modules\SocialMedia\Domain\InformationGatherer\YoutubeSubscriberGatherer;
use App\Modules\SocialMedia\Domain\SocialMediaAccount;
use App\Modules\SocialMedia\Domain\SocialMediaUserCount;
use Illuminate\Console\Command;

class GatherSocialMediaUserCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'social:gather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gather the follower / subscriber count based the social media accounts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $accounts = SocialMediaAccount::all();
        foreach($accounts as $account) {
        	switch($account->name) {
		        case 'Twitter':
			        try {
				        SocialMediaUserCount::create( [
					        'account_id' => $account->id,
					        'count' => ( new TwitterFollowerGatherer($account) )->gather()
				        ] );
			        } catch ( \Exception $e ) {
				        die($e->getMessage());
			        }
		        	break;
		        case 'Youtube':
			        try {
				        SocialMediaUserCount::create( [
					        'account_id' => $account->id,
					        'count' => ( new YoutubeSubscriberGatherer($account) )->gather()
				        ] );
			        } catch ( \Exception $e ) {
				        die($e->getMessage());
			        }
			        break;
	        }

        }
    }
}
