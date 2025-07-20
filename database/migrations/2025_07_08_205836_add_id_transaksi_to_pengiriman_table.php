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
        Schema::table('pengiriman', function (Blueprint $table) {
            $table->unsignedBigInteger('id_transaksi')->after('id')->nullable();

            $table->foreign('id_transaksi')->references('id')->on('transaksis')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('pengiriman', function (Blueprint $table) {
            $table->dropForeign(['id_transaksi']);
            $table->dropColumn('id_transaksi');
        });
    }
};
