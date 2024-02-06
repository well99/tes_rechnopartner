<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->enum('description', ['pembelian', 'penjualan']);
            $table->date('date');
            $table->string('qty', 50);
            $table->string('cost', 50);
            $table->string('price', 50);
            $table->string('total_cost', 50);
            $table->string('qty_balance', 50);
            $table->string('value_balance', 50);
            $table->string('hpp', 50);
            $table->string('stock', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
