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
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign('transaksis_id_penerima_foreign');

            $table->foreign('id_penerima')
                ->references('id_penerima')
                ->on('penerimas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign(['id_penerima']);

            $table->foreign('id_penerima')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }
};
