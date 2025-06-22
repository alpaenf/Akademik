<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model {

    protected $table = 'prodi';
    
    protected $fillable = ['nama_prodi', 'fakultas_id'];

    public function fakultas() {
        return $this->belongsTo(Fakultas::class);
    }

    public function mahasiswa() {
        return $this->hasMany(\App\Models\Mahasiswa::class, 'prodi_id');
    }
}
