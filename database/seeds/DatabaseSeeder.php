<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MainCategoriesTableSeeder::class);
        $this->call(SubCategoriesTableSeeder::class);
        $this->call(PaymentModesTableSeeder::class);
        $this->call(FloorsTableSeeder::class);
        $this->call(OfferStatusesTableSeeder::class);
        $this->call(OfferTypesTableSeeder::class);
        $this->call(ReachTimesTableSeeder::class);
    }
}
