<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SubCategoriesTableSeeder extends Seeder
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

            DB::table('categories')->insert([
                [
                    'name' => 'Clothing',
                    'slug' => 'clothing',
                    'category_id'=> DB::table('categories')->where('slug','men-fashion')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Footwear',
                    'slug' => 'footwear',
                    'category_id'=> DB::table('categories')->where('slug','men-fashion')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Grooming',
                    'slug' => 'grooming',
                    'category_id'=> DB::table('categories')->where('slug','men-fashion')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Specs & Sunglasses',
                    'slug' => 'specs-sunglasses',
                    'category_id'=> DB::table('categories')->where('slug','men-fashion')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Watches',
                    'slug' => 'watches',
                    'category_id'=> DB::table('categories')->where('slug','men-fashion')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Clothing',
                    'slug' => 'clothing',
                    'category_id'=> DB::table('categories')->where('slug','women-fashion')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Footwear',
                    'slug' => 'footwear',
                    'category_id'=> DB::table('categories')->where('slug','women-fashion')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Beauty',
                    'slug' => 'beauty',
                    'category_id'=> DB::table('categories')->where('slug','women-fashion')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Specs & Sunglasses',
                    'slug' => 'specs-sunglasses',
                    'category_id'=> DB::table('categories')->where('slug','women-fashion')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Watches',
                    'slug' => 'watches',
                    'category_id'=> DB::table('categories')->where('slug','women-fashion')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Mobile & Accessories',
                    'slug' => 'mobile-accessories',
                    'category_id'=> DB::table('categories')->where('slug','electronics')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Refrigerator',
                    'slug' => 'refrigerator',
                    'category_id'=> DB::table('categories')->where('slug','electronics')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Television',
                    'slug' => 'television',
                    'category_id'=> DB::table('categories')->where('slug','electronics')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'AC & Cooler',
                    'slug' => 'ac-cooler',
                    'category_id'=> DB::table('categories')->where('slug','electronics')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Laptop & Tablet',
                    'slug' => 'laptop-tablet',
                    'category_id'=> DB::table('categories')->where('slug','electronics')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Washing Machine',
                    'slug' => 'washing-machine',
                    'category_id'=> DB::table('categories')->where('slug','electronics')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Restaurants',
                    'slug' => 'restaurants',
                    'category_id'=> DB::table('categories')->where('slug','food')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Snacks Center',
                    'slug' => 'snacks-center',
                    'category_id'=> DB::table('categories')->where('slug','food')->pluck('id')->first(),
                    'created_at' => $now,
                    'updated_at' => $now
                ]

            ]);
        }
    }
}
