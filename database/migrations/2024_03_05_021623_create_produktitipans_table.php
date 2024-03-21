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
        Schema::create('produktitipan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk', 100);
            $table->string('nama_supplier', 100);
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('stok');
            $table->string('keterangan', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produktitipan');
    }
};
