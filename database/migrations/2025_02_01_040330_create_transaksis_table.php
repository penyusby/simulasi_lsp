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
            $table->date('tanggal');
            $table->string('nama_pelanggan');
            $table->foreignId('layanan_id')->constrained('tb_layanan')->onDelete('cascade');
            $table->integer('berat'); // dalam KG
            $table->integer('total_harga'); // hasil berat * harga layanan
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
