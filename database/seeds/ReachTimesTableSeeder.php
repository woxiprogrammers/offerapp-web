<?php

use Illuminate\Database\Seeder;

class ReachTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $now = \Carbon\Carbon::now();
            \Illuminate\Support\Facades\DB::table('reach_times')->insert([
                [
                    'name' => '30 mins',
                    'slug' => '30-mins',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => '1 Hour',
                    'slug' => '1-hour',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => '2 Hours',
                    'slug' => '2-hours',
                    'created_at' => $now,
                    'updated_at' => $now
                ]
            ]);
        }
    }
}
