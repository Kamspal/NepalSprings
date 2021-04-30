<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at'=>'admin@admin.com',
            'password' => bcrypt('admin123'),
            'admin'=>'1',

        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@user.com',
            'email_verified_at'=>'user@user.com',
            'password' => bcrypt('user123'),
            'admin'=>'0',
        ]);
    }
}