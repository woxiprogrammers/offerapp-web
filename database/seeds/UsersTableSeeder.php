<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $sellerRoleId = Role::where('slug','seller')->pluck('id')->first();
        $customerRoleId = Role::where('slug','customer')->pluck('id')->first();
        $superAdminRoleId = Role::where('slug','super-admin')->pluck('id')->first();
        $moderatorRoleId = Role::where('slug','moderator')->pluck('id')->first();
        DB::table('users')->insert([
            [
                'role_id' => $superAdminRoleId,
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'mobile_no' => '5555568696',
                'created_at' => $now,
                'updated_at' => $now

            ],
            [
                'role_id' => $moderatorRoleId,
                'first_name' => 'Rakesh',
                'last_name' => 'Verma',
                'mobile_no' => '9821648696',
                'created_at' => $now,
                'updated_at' => $now

            ],
            [
                'role_id' => $sellerRoleId,
                'first_name' => 'Sonali',
                'last_name' => 'Pawar',
                'mobile_no' => '5656564896',
                'created_at' => $now,
                'updated_at' => $now

            ],

            [
                'role_id' => $sellerRoleId,
                'first_name' => 'Arvind',
                'last_name' => 'Chawdhary',
                'mobile_no' => '1234567890',
                'created_at' => $now,
                'updated_at' => $now

            ],
            [
                'role_id' => $customerRoleId,
                'first_name' => 'Tejas',
                'last_name' => 'Rathod',
                'mobile_no' => '8082448845',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'role_id' => $customerRoleId,
                'first_name' => 'Annu',
                'last_name' => 'Gupta',
                'mobile_no' => '8884567890',
                'created_at' => $now,
                'updated_at' => $now

            ]


            ]);
    }
}
