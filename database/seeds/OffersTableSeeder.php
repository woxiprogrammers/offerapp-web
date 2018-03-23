<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\OfferStatus;
use App\SellerAddress;
use App\Category;
use App\OfferType;


class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $now = Carbon::now();

            DB::table('offers')->insert([
                [
                    'category_id' => DB::table('categories')->where('slug','men-fashion')->pluck('id')->first(),
                    'offer_type_id' => DB::table('offer_types')->where('slug','buy1get1')->pluck('id')->first(),
                    'seller_address_id' => SellerAddress::where('id',1)->pluck('id')->first(),
                    'offer_status_id' => DB::table('offer_statuses')->where('slug','draft')->pluck('id')->first(),
                    'valid_from' => '2018-03-21',
                    'valid_to' => '2018-03-25',
                    'created_at' => $now,
                    'updated_at' => $now

                ],
                [
                    'category_id' => DB::table('categories')->where('slug','electronics')->pluck('id')->first(),
                    'offer_type_id' => DB::table('offer_types')->where('slug','upto20%')->pluck('id')->first(),
                    'seller_address_id' => SellerAddress::where('id',1)->pluck('id')->first(),
                    'offer_status_id' => DB::table('offer_statuses')->where('slug','approved')->pluck('id')->first(),
                    'valid_from' => '2018-04-22',
                    'valid_to' => '2018-07-25',
                    'created_at' => $now,
                    'updated_at' => $now

                ]

            ]);
        }
    }
}
