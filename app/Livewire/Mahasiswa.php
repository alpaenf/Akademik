<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mahasiswa as MahasiswaModel;
use App\Models\Prodi;

class Mahasiswa extends Component
{
    protected $table = 'mahasiswa';
    
    public $nim, $nama, $prodi_id;
    public $isEditing = false;
    public $editingId;

    public function render()
    {
        return view('livewire.mahasiswa', [
            'mahasiswa' => MahasiswaModel::with('prodi')->paginate(10),
            'prodi' => Prodi::all()
        ]);
    }

    public function create()
    {
        $this->resetForm();
    }

    public function store()
    {
        $this->validate([
            'nim' => 'required|unique:mahasiswa,nim,' . ($this->editingId ?? ''),
            'nama' => 'required|string',
            'prodi_id' => 'required|exists:prodi,id',
        ]);

        if ($this->isEditing) {
            MahasiswaModel::find($this->editingId)->update([
                'nim' => $this->nim,
                'nama' => $this->nama,
                'prodi_id' => $this->prodi_id
            ]);
            session()->flash('success', 'Data mahasiswa berhasil diperbarui.');
        } else {
            MahasiswaModel::create([
                'nim' => $this->nim,
                'nama' => $this->nama,
                'prodi_id' => $this->prodi_id
            ]);
            session()->flash('success', 'Data mahasiswa berhasil disimpan.');
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $mahasiswa = MahasiswaModel::find($id);
        $this->editingId = $id;
        $this->nim = $mahasiswa->nim;
        $this->nama = $mahasiswa->nama;
        $this->prodi_id = $mahasiswa->prodi_id;
        $this->isEditing = true;
    }

    public function delete($id)
    {
        MahasiswaModel::find($id)->delete();
        session()->flash('success', 'Data mahasiswa berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['nim', 'nama', 'prodi_id', 'isEditing', 'editingId']);
    }
}
