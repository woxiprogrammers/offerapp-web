<?php

use Illuminate\Database\Seeder;

class PaymentModesTableSeeder extends Seeder
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
            \Illuminate\Support\Facades\DB::table('payment_modes')->insert([
                [
                    'name' => 'Credit Card',
                    'slug' => 'credit-card',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Debit Card',
                    'slug' => 'debit-card',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Paytm',
                    'slug' => 'paytm',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Cash',
                    'slug' => 'cash',
                    'created_at' => $now,
                    'updated_at' => $now
                ]
            ]);
        }
    }

}
