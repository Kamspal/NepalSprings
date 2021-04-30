<?php

use Illuminate\Database\Seeder;

class OrderstatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            'status' => 'Ordered',

        ]);

        DB::table('order_statuses')->insert([
            'status' => 'Processed',

        ]);
        DB::table('order_statuses')->insert([
            'status' => 'Shipped',

        ]);
        DB::table('order_statuses')->insert([
            'status' => 'Delivered',

        ]);
    }
}
