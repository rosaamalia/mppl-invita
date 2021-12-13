<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => "$2y$10$687kGapeWCJU7o8XRmHoROgLw..gbeyhvuLyHwQ0U8RU8HaDVJg2y",
            'nama_user' => 'admin invita',
            'role_user' => 'admin',
            'telepon_user' => '081234567789',
        ]);
    }
}