<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('login', function (Blueprint $table) {
            $table->id();

            $table->string('login_nama')->nullable();
            $table->string('login_username')->unique()->nullable();
            $table->string('login_password')->nullable();
            $table->string('login_no_karyawan')->nullable();
            $table->string('login_email')->unique()->nullable();
            $table->string('login_telepon')->nullable();
            $table->text('login_token')->nullable();
            $table->string('login_level')->nullable(); // PJ [Penanggung Jawab ] - HO [Head Office] - SP [Supervisor]
            $table->string('login_jabatan')->nullable();
            $table->string('login_status')->nullable(); // unverified / verified

            $table->unsignedBigInteger('divisi_id')->nullable()->default(null);
            $table->foreign('divisi_id')->references('id')->on('divisi')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logins');
    }
};
