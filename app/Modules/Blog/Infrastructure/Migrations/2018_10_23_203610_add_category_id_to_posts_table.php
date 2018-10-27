<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
	       $table->unsignedInteger('category_id')->nullable(true);
        });
	    Schema::table('posts', function (Blueprint $table) {
		    $table->foreign('category_id')->references('id')->on('categories');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
        	$table->removeColumn('category_id');
        });
    }
}
