<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mahasiswa;
use App\Models\Krs;
use App\Models\Matakuliah;

class KrsForm extends Component
{
    public $mahasiswa_id;
    public $selectedMatkul = [];
    public $semester;
    public $tahun_akademik;

    public function render()
    {
        return view('livewire.krs-form', [
            'mahasiswas' => Mahasiswa::all(),
            'matakuliahs' => Matakuliah::all(),
        ]);
    }

    public function store()
    {
        $this->validate([
            'mahasiswa_id' => 'required',
            'selectedMatkul' => 'required|array|min:1',
            'semester' => 'required|integer|min:1|max:8',
            'tahun_akademik' => 'required|string'
        ]);

        $totalSKS = Matakuliah::whereIn('id', $this->selectedMatkul)->sum('sks');

        if ($totalSKS > 24) {
            session()->flash('error', 'Total SKS tidak boleh lebih dari 24');
            return;
        }

        foreach ($this->selectedMatkul as $idMatkul) {
            Krs::create([
                'mahasiswa_id' => $this->mahasiswa_id,
                'matakuliah_id' => $idMatkul,
                'semester' => $this->semester,
                'tahun_akademik' => $this->tahun_akademik
            ]);
        }

        session()->flash('message', 'KRS berhasil disimpan.');
        $this->reset();
    }
}

