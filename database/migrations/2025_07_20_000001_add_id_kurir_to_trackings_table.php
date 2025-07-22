<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('trackings', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kurir')->nullable()->after('no_resi');
            $table->foreign('id_kurir')->references('id_kurir')->on('kurirs')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('trackings', function (Blueprint $table) {
            $table->dropForeign(['id_kurir']);
            $table->dropColumn('id_kurir');
        });
    }
}; 