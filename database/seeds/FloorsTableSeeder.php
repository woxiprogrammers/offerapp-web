<?php

use Illuminate\Database\Seeder;

class FloorsTableSeeder extends Seeder
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
            \Illuminate\Support\Facades\DB::table('floors')->insert([
                [
                    'name' => 'Basement',
                    'slug' => 'basement',
                    'no'=> '-1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Ground',
                    'slug' => 'ground',
                    'no'=> '0',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'First',
                    'slug' => 'first',
                    'no'=> '1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Second',
                    'slug' => 'second',
                    'no'=> '2',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Third',
                    'slug' => 'third',
                    'no'=> '3',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Fourth',
                    'slug' => 'fourth',
                    'no'=> '4',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Fifth',
                    'slug' => 'fifth',
                    'no'=> '5',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Sixth',
                    'slug' => 'sixth',
                    'no'=> '6',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Seventh',
                    'slug' => 'seventh',
                    'no'=> '7',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Eighth',
                    'slug' => 'eighth',
                    'no'=> '8',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Ninth',
                    'slug' => 'ninth',
                    'no'=> '9',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Tenth',
                    'slug' => 'tenth',
                    'no'=> '10',
                    'created_at' => $now,
                    'updated_at' => $now
                ]
            ]);
        }
    }
}
