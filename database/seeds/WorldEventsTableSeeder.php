<?php

use Illuminate\Database\Seeder;

class WorldEventsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\WorldEvent::class, 50)->create()->each(function ($e) {
            for ($i = 1; $i < rand(10, 30); $i++){
                $e->stands()->save(factory(\App\Stand::class)->make());
            }

        });
    }
}
