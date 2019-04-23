<?php

use Illuminate\Database\Seeder;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    factory(\App\Modules\Visitors\Domain\IsHome::class, 50)->create();
    }
}
