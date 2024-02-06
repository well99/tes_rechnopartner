<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('transaksis')->insert([
            'description' => 'pembelian',
            'date' => date('Y-m-d H:i:s', time()),
            'qty' => 40,
            'cost' => 100,
            'price' => 100,
            'total_cost' => 4000,
            'qty_balance' => 40,
            'value_balance' => 4000,
            'hpp' => 100,
            'stock' => 100,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->call([
            DataSisipanSeeder::class,
            DataAkhirSeeder::class,
        ]);
    }
}
