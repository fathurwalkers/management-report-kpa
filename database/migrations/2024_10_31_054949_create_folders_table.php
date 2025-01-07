<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('folder', function (Blueprint $table) {
            $table->id();

            $table->string('folder_nama')->nullable();
            $table->string('folder_keterangan')->nullable();
            $table->string('folder_kode')->nullable();
            $table->string('folder_status')->nullable();

            $table->unsignedBigInteger('divisi_id')->nullable()->default(null);
            $table->foreign('divisi_id')->references('id')->on('divisi')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('folder');
    }
};
