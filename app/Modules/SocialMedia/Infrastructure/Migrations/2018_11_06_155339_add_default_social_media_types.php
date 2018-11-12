<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class AddDefaultSocialMediaTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    DB::table('social_media_account_types')->insert([
	    	'name' => 'Instagram',
		    'color' => '#0e68ce'
	    ]);

	    DB::table('social_media_account_types')->insert([
		    'name' => 'Youtube',
		    'color' => '#ee0f0f'
	    ]);

	    DB::table('social_media_account_types')->insert([
		    'name' => 'Twitter',
		    'color' => '#433e90'
	    ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    DB::table('social_media_account_types')->where('name', 'Instagram');
	    DB::table('social_media_account_types')->where('name', 'Youtube');
	    DB::table('social_media_account_types')->where('name', 'Twitter');
    }
}
