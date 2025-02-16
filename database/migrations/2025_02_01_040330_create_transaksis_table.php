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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->useCurrent();
            $table->string('nama_pelanggan');
            $table->foreignId('layanan_id')->constrained('layanans')->onDelete('cascade');
            $table->integer('berat'); // dalam KG
            $table->enum('keterangan', ['Proses', 'Selesai'])->default('Proses');
            $table->enum('pembayaran', ['Belum Bayar', 'Lunas'])->default('Belum Bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
