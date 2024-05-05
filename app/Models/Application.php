<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'vacancy_id',
        'user_id',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'usia',
        'alamat_lengkap',
        'nomor_hp',
        'nomor_kontak_darurat',
        'skck',
        'surat_keterangan_sehat',
        'ktp',
        'surat_lamaran_kerja',
        'npwp',
        'paklaring',
        'cv',
        'status'
    ];
}
