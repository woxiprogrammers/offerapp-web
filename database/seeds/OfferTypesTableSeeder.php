<?php

use Illuminate\Database\Seeder;

class OfferTypesTableSeeder extends Seeder
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
            \Illuminate\Support\Facades\DB::table('offer_types')->insert([
                [
                    'name' => 'Buy 1 Get 1',
                    'slug' => 'buy1get1',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Flat 50 %',
                    'slug' => 'flat50%',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Upto 20 %',
                    'slug' => 'upto20%',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Upto 70 %',
                    'slug' => 'upto70%',
                    'created_at' => $now,
                    'updated_at' => $now
                ]
            ]);
        }
    }
}
