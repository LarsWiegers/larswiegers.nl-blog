<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialTypeIdToSocialMediaAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('social_media_accounts', function (Blueprint $table) {
		    $table->unsignedInteger('type_id');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('social_media_accounts', function (Blueprint $table) {
		    $table->dropColumn('type_id');
	    });
    }
}
