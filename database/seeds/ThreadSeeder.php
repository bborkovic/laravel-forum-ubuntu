<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('threads')->truncate();
         factory('App\Thread', 110)->create();
    }
}
