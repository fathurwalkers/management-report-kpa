<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();

            $table->text('laporan_rencana_kerja')->nullable();
            $table->json('laporan_jumlah_hari')->nullable();
            $table->integer('laporan_presentasi_pencapaian')->nullable();
            $table->string('laporan_keterangan')->nullable();
            $table->string('laporan_status')->nullable();
            $table->string('laporan_file')->nullable();

            $table->unsignedBigInteger('area_id')->nullable()->default(null);
            $table->foreign('area_id')->references('id')->on('area')->onDelete('cascade');

            $table->unsignedBigInteger('laporan_tujuan')->nullable()->default(null);
            $table->foreign('laporan_tujuan')->references('id')->on('login')->onDelete('cascade');

            $table->unsignedBigInteger('divisi_id')->nullable()->default(null);
            $table->foreign('divisi_id')->references('id')->on('divisi')->onDelete('cascade');

            $table->unsignedBigInteger('login_id')->nullable()->default(null);
            $table->foreign('login_id')->references('id')->on('login')->onDelete('cascade');

            $table->unsignedBigInteger('periode_id')->nullable()->default(null);
            $table->foreign('periode_id')->references('id')->on('periode')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
