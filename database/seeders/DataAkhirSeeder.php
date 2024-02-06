<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataAkhirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksis')->insert([
            'description' => 'pembelian',
            'date' => date('Y-m-d H:i:s', time()),
            'qty' => 10,
            'cost' => 100,
            'price' => 100,
            'total_cost' => 1000,
            'qty_balance' => 10,
            'value_balance' => 1000,
            'hpp' => 100,
            'stock' => 50,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
