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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacancy_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nama_lengkap');
            $table->unsignedBigInteger('nik');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->integer('usia');
            $table->string('alamat_lengkap');
            $table->string('nomor_hp');
            $table->string('nomor_kontak_darurat');
            $table->string('skck');
            $table->string('surat_keterangan_sehat');
            $table->string('ktp');
            $table->string('surat_lamaran_kerja');
            $table->string('npwp')->nullable();
            $table->string('paklaring')->nullable();
            $table->string('cv')->nullable();
            $table->enum('status', ['Review', 'Tidak Lolos Review', 'Lolos Review', 'Lolos Interview', 'Lolos Kontak Referensi'])->default('Review');
            $table->foreign('vacancy_id')->references('id')->on('vacancies');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
