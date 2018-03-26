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
                'password' => bcrypt('superadmin'),
                'email' => 'superadmin@gmail.com',
                'mobile_no' => '1111111111',
                'created_at' => $now,
                'updated_at' => $now

            ],
            [
                'role_id' => $moderatorRoleId,
                'first_name' => 'Moderator',
                'last_name' => ' ',
                'password' => bcrypt('moderator'),
                'email' => 'moderator@gmail.com',
                'mobile_no' => '2222222222',
                'created_at' => $now,
                'updated_at' => $now

            ],
            [
                'role_id' => $sellerRoleId,
                'first_name' => 'Sonali',
                'last_name' => 'Pawar',
                'password' => bcrypt('sonali'),
                'email' => 'sonali@gmail.com',
                'mobile_no' => '3333333333',
                'created_at' => $now,
                'updated_at' => $now

            ],

            [
                'role_id' => $sellerRoleId,
                'first_name' => 'Arvind',
                'last_name' => 'Chawdhary',
                'password' => bcrypt('arvind'),
                'email' => 'arvind@gmail.com',
                'mobile_no' => '4444444444',
                'created_at' => $now,
                'updated_at' => $now

            ],
            [
                'role_id' => $customerRoleId,
                'first_name' => 'Tejas',
                'last_name' => 'Rathod',
                'password' => bcrypt('tejas'),
                'email' => 'tejas@gmail.com',
                'mobile_no' => '5555555555',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'role_id' => $customerRoleId,
                'first_name' => 'Annu',
                'last_name' => 'Gupta',
                'password' => bcrypt('annu'),
                'email' => 'annu@gmail.com',
                'mobile_no' => '6666666666',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}
