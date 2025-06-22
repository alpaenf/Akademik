<?php

// app/Livewire/Fakultas.php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Fakultas as FakultasModel;
use Livewire\WithPagination;

class Fakultas extends Component
{
    use WithPagination;

    public $nama_fakultas;
    public $isEditing = false;
    public $editingId;

    protected $rules = [
        'nama_fakultas' => 'required|min:3'
    ];

    protected $listeners = ['refreshFakultas' => '$refresh'];

    public function create()
    {
        $this->resetForm();
    }

    public function store()
    {
        $this->validate();

        if ($this->isEditing) {
            FakultasModel::find($this->editingId)->update([
                'nama_fakultas' => $this->nama_fakultas
            ]);
            session()->flash('success', 'Fakultas berhasil diperbarui.');
        } else {
            FakultasModel::create([
                'nama_fakultas' => $this->nama_fakultas
            ]);
            session()->flash('success', 'Fakultas berhasil ditambahkan.');
        }

        $this->resetForm();
        $this->dispatch('refreshFakultas');
    }

    public function edit($id)
    {
        $fakultas = FakultasModel::find($id);
        $this->editingId = $id;
        $this->nama_fakultas = $fakultas->nama_fakultas;
        $this->isEditing = true;
    }

    public function delete($id)
    {
        FakultasModel::find($id)->delete();
        session()->flash('success', 'Fakultas berhasil dihapus.');
        $this->dispatch('refreshFakultas');
    }

    public function resetForm()
    {
        $this->reset(['nama_fakultas', 'isEditing', 'editingId']);
    }

    public function render()
    {
        return view('livewire.fakultas', [
            'fakultasList' => FakultasModel::withCount('prodi')->paginate(10),
        ]);
    }
}
