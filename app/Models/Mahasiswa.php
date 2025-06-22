<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    // Jika kolom yang boleh diisi massal
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'alamat',
        'prodi_id',
        'fakultas_id',
        'tahun_masuk',
        'status'
    ];

    // Relasi ke Prodi (many to one)
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function krs()
    {
        return $this->hasMany(Krs::class);
    }
}