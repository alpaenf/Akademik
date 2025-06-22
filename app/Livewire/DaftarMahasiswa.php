<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Mahasiswa;
use App\Models\Krs;

class DaftarMahasiswa extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedMahasiswa = null;

    public function render()
    {
        $mahasiswa = Mahasiswa::where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('nim', 'like', '%' . $this->search . '%')
            ->with(['prodi', 'fakultas'])
            ->paginate(10);

        $rekapSks = null;
        if ($this->selectedMahasiswa) {
            $rekapSks = Krs::where('mahasiswa_id', $this->selectedMahasiswa)
                ->with('matakuliah')
                ->get()
                ->groupBy('semester');
        }

        return view('livewire.daftar-mahasiswa', [
            'mahasiswa' => $mahasiswa,
            'rekapSks' => $rekapSks
        ]);
    }

    public function selectMahasiswa($id)
    {
        $this->selectedMahasiswa = $id;
    }

    public function exportRekap($mahasiswaId)
    {
        $mahasiswa = Mahasiswa::with(['prodi', 'fakultas'])->find($mahasiswaId);
        $krs = Krs::where('mahasiswa_id', $mahasiswaId)
            ->with('matakuliah')
            ->get()
            ->groupBy('semester');

        return view('exports.rekap-sks', [
            'mahasiswa' => $mahasiswa,
            'krs' => $krs
        ]);
    }
}
