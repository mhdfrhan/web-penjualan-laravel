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
        Schema::create('detail_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->references('id')->on('data_barangs');
            $table->foreignId('order_detail_id');
						$table->foreignId('user_id')->references('id')->on('users');
						$table->bigInteger('jumlah');
						$table->bigInteger('subtotal');
						$table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_barangs');
    }
};
