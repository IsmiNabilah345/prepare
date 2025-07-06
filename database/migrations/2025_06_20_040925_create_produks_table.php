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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kurir')->nullable()->constrained('users')->onDelete('set null');
            $table->integer('jumlah_produk');
            $table->integer('berat_kiriman');
            $table->integer('berat_asli');
            $table->integer('volume_produk');
            $table->string('ket_produk');
            $table->string('no_resi')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
