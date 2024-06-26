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
        Schema::create('absensi_karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan', 100);
            $table->date('tanggal_masuk');
            $table->time('waktu_masuk');
            $table->enum('statuss', ['Sakit', 'Cuti', 'Masuk', 'Izin']);
            $table->time('waktu_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_karyawans');
    }
};
