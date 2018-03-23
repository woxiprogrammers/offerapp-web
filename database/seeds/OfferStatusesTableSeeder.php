<?php

use Illuminate\Database\Seeder;

class OfferStatusesTableSeeder extends Seeder
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
            \Illuminate\Support\Facades\DB::table('offer_statuses')->insert([
                [
                    'name' => 'Draft',
                    'slug' => 'draft',
                    'type'=> 'seller',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Pending',
                    'slug' => 'pending',
                    'type'=> 'seller',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Approved',
                    'slug' => 'approved',
                    'type'=> 'seller',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Disapproved',
                    'slug' => 'disapproved',
                    'type'=> 'seller',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Enabled',
                    'slug' => 'enabled',
                    'type'=> 'seller',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Disabled',
                    'slug' => 'disabled',
                    'type'=> 'seller',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Expired',
                    'slug' => 'expired',
                    'type'=> 'seller',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Interested',
                    'slug' => 'interested',
                    'type'=> 'customer',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Grabbed',
                    'slug' => 'grabbed',
                    'type'=> 'customer',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Acknowledged',
                    'slug' => 'acknowledged',
                    'type'=> 'customer',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Remove',
                    'slug' => 'remove',
                    'type'=> 'customer',
                    'created_at' => $now,
                    'updated_at' => $now
                ]

            ]);
        }

    }
}
