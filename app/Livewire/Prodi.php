<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Prodi as ProdiModel;
use App\Models\Fakultas;

class Prodi extends Component
{
    public $nama_prodi, $fakultas_id;
    public $isEditing = false;
    public $editingId;

    public function render()
    {
        return view('livewire.prodi', [
            'prodi' => ProdiModel::with('fakultas')->paginate(10),
            'fakultas' => Fakultas::all(),
        ]);
    }

    public function create()
    {
        $this->resetForm();
    }

    public function store()
    {
        $this->validate([
            'nama_prodi' => 'required|string|max:255',
            'fakultas_id' => 'required|exists:fakultas,id',
        ]);

        if ($this->isEditing) {
            ProdiModel::find($this->editingId)->update([
                'nama_prodi' => $this->nama_prodi,
                'fakultas_id' => $this->fakultas_id,
            ]);
            session()->flash('success', 'Program studi berhasil diperbarui.');
        } else {
            ProdiModel::create([
                'nama_prodi' => $this->nama_prodi,
                'fakultas_id' => $this->fakultas_id,
            ]);
            session()->flash('success', 'Program studi berhasil ditambahkan.');
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $prodi = ProdiModel::find($id);
        $this->editingId = $id;
        $this->nama_prodi = $prodi->nama_prodi;
        $this->fakultas_id = $prodi->fakultas_id;
        $this->isEditing = true;
    }

    public function delete($id)
    {
        $prodi = ProdiModel::find($id);
        if ($prodi->mahasiswa()->count() > 0) {
            session()->flash('error', 'Tidak bisa menghapus prodi yang masih memiliki mahasiswa.');
            return;
        }
        $prodi->delete();
        session()->flash('success', 'Program studi berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['nama_prodi', 'fakultas_id', 'isEditing', 'editingId']);
    }
}
