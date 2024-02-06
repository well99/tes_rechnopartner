<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSisipanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksis')->insert([
            'description' => 'penjualan',
            'date' => date('Y-m-d H:i:s', time()),
            'qty' => -20,
            'cost' => 100,
            'price' => 200,
            'total_cost' => -2000,
            'qty_balance' => 20,
            'value_balance' => 2000,
            'hpp' => 100,
            'stock' => 70,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
