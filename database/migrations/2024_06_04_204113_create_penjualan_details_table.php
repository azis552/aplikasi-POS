<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualan_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penjualan')->nullable();
            $table->unsignedBigInteger('id_produk');
            $table->string('diskon')->nullable();
            $table->string('jumlah_beli');
            $table->string('harga_terjual');
            $table->string('sesi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan_details');
    }
};
