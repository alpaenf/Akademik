<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mahasiswa;

class DaftarMahasiswa extends Component
{
    public function render()
    {
        $daftar = Mahasiswa::with(['prodi', 'krs.matakuliah'])->get();

        return view('livewire.daftar-mahasiswa', [
            'mahasiswa' => $daftar
        ]);
    }
}
