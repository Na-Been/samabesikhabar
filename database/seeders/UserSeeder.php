<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the datagbase seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        $rows = [
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'display_name' => 'Super Admin',
                'user_name' => 'superadmin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('secret'),
                'status' => 'active',
                'role' => 'superadmin',
                'email_verified_at' => '2020-01-01'
            ],
        ];
        DB::table('users')->insert($rows);
    }
}
