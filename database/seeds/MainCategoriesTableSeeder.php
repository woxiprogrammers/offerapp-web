<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MainCategoriesTableSeeder extends Seeder
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
                    'name' => 'Men Fashion',
                    'slug' => 'men-fashion',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Women Fashion',
                    'slug' => 'women-fashion',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Electronics',
                    'slug' => 'electronics',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Gym',
                    'slug' => 'gym',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Sports',
                    'slug' => 'sports',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Mobile & Accessories',
                    'slug' => 'electronics',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Food',
                    'slug' => 'food',
                    'created_at' => $now,
                    'updated_at' => $now
                ],
                [
                    'name' => 'Night Life',
                    'slug' => 'night-life',
                    'created_at' => $now,
                    'updated_at' => $now
                ]

            ]);
        }
    }
}
