<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_produk')->constrained('produks')->onDelete('cascade');
            $table->foreignId('id_kurir')->constrained('users')->onDelete('cascade');

            $table->unsignedBigInteger('id_penerima');
            $table->foreign('id_penerima')->references('id_penerima')->on('penerimas')->onDelete('cascade');

            $table->date('tanggal_kirim')->nullable();
            $table->string('status')->default('belum dikirim');
            $table->string('tipe_kendaraan')->default('motor');
            $table->date('estimasi_sampai');
            $table->string('catatan');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
