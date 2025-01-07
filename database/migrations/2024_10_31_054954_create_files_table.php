<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('file', function (Blueprint $table) {
            $table->id();

            $table->string('file_nama')->nullable();
            $table->string('file_extensi')->nullable();
            $table->string('file_kode')->nullable();
            $table->string('file_jenis')->nullable();
            $table->string('file_status')->nullable();
            $table->string('file_path')->nullable();

            $table->unsignedBigInteger('laporan_id')->nullable()->default(null);
            $table->foreign('laporan_id')->references('id')->on('laporan')->onDelete('cascade');

            $table->unsignedBigInteger('folder_id')->nullable()->default(null);
            $table->foreign('folder_id')->references('id')->on('folder')->onDelete('cascade');

            $table->unsignedBigInteger('login_id')->nullable()->default(null);
            $table->foreign('login_id')->references('id')->on('login')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('file');
    }
};
