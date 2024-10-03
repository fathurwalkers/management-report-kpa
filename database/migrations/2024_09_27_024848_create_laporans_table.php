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

            $table->text('laporan_nama')->nullable();
            $table->text('laporan_keterangan')->nullable();
            $table->string('laporan_jenis_file')->nullable();
            $table->string('laporan_nama_file')->nullable();
            $table->string('laporan_tanggal_upload')->nullable();
            $table->string('laporan_tanggal_edit')->nullable();
            $table->string('laporan_status')->nullable();

            $table->unsignedBigInteger('divisi')->nullable()->default(null);
            $table->foreign('divisi')->references('id')->on('divisi')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
