<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Phong Dao Tao',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Giang Vien',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user'),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Thêm các người dùng mẫu khác nếu cần
        ]);
    }
}
