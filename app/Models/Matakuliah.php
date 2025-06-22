<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    
    protected $fillable = [
        'kode',
        'nama_matakuliah',
        'sks',
        'semester',
        'prodi_id',
        'fakultas_id',
        'dosen',
        'status'
    ];

    // Accessor to map nama_matakuliah to nama for compatibility
    public function getNamaAttribute()
    {
        return $this->nama_matakuliah;
    }

    // Mutator to map nama to nama_matakuliah for compatibility
    public function setNamaAttribute($value)
    {
        $this->attributes['nama_matakuliah'] = $value;
    }

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

