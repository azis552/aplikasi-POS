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
        Schema::create('bebans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nominal');
            $table->enum('Jenis',['Beban Operasional','Beban Administrasi','Beban Lainnya']);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bebans');
    }
};
