<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;

    protected $table = 'krs';
    
    protected $fillable = [
        'mahasiswa_id',
        'matakuliah_id',
        'semester',
        'tahun_akademik'
    ];

    public function matakuliah() {
        return $this->belongsTo(\App\Models\Matakuliah::class, 'matakuliah_id');
    }

    public function mahasiswa() {
        return $this->belongsTo(\App\Models\Mahasiswa::class, 'mahasiswa_id');
    }
}

