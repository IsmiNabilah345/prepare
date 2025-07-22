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
            $table->unsignedBigInteger('id_pengirim');
            $table->unsignedBigInteger('id_penerima');
            $table->string('layanan');
            $table->float('berat');
            $table->date('tgl_transaksi');
            $table->foreignId('id_tarif')->constrained('tarifs');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('id_pengirim')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_penerima')->references('id')->on('users')->onDelete('cascade');
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
