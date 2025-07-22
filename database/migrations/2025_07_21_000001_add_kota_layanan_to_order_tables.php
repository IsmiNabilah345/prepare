<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengirims', function (Blueprint $table) {
            $table->string('kota_pengirim')->nullable()->after('alamat_pengirim');
        });
        Schema::table('penerimas', function (Blueprint $table) {
            $table->string('kota_penerima')->nullable()->after('alamat_penerima');
        });
        Schema::table('pengiriman', function (Blueprint $table) {
            $table->string('layanan')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('pengirims', function (Blueprint $table) {
            $table->dropColumn('kota_pengirim');
        });
        Schema::table('penerimas', function (Blueprint $table) {
            $table->dropColumn('kota_penerima');
        });
        Schema::table('pengiriman', function (Blueprint $table) {
            $table->dropColumn('layanan');
        });
    }
}; 