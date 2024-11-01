<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->unsignedBigInteger('laporan_tujuan')->nullable()->default(null);
            $table->foreign('laporan_tujuan')->references('id')->on('login')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            //
        });
    }
};
