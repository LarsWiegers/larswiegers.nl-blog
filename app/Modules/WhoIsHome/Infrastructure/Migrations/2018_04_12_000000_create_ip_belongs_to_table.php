<?php

use App\Modules\WhoIsHome\Domain\IpBelongsTo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpBelongsToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ip-belongs-to-table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip');
            $table->string('belongs-to');
            $table->timestamps();
        });

        IpBelongsTo::create([
            'ip' => '192.168.1.90',
            'belongs-to' => 'lars'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ip-belongs-to-table');
    }
}
