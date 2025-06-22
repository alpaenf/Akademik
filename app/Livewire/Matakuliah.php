<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Matakuliah as MatakuliahModel;
use App\Models\Prodi;
use App\Models\Fakultas;

class Matakuliah extends Component
{
    use WithPagination;

    public $search = '';
    public $kode, $nama, $sks, $semester, $prodi_id, $fakultas_id, $dosen, $status;
    public $isEditing = false;
    public $editingId = null;

    protected $rules = [
        'kode' => 'required|string|max:10',
        'nama' => 'required|string|max:255',
        'sks' => 'required|integer|min:1|max:6',
        'semester' => 'required|integer|min:1|max:8',
        'prodi_id' => 'required|exists:prodi,id',
        'fakultas_id' => 'required|exists:fakultas,id',
        'dosen' => 'required|string|max:255',
        'status' => 'required|in:aktif,nonaktif'
    ];

    public function render()
    {
        $matakuliah = MatakuliahModel::where('nama_matakuliah', 'like', '%' . $this->search . '%')
            ->orWhere('kode', 'like', '%' . $this->search . '%')
            ->with(['prodi', 'fakultas'])
            ->paginate(10);
        
        $prodi = Prodi::all();
        $fakultas = Fakultas::all();

        return view('livewire.matakuliah', [
            'matakuliah' => $matakuliah,
            'prodi' => $prodi,
            'fakultas' => $fakultas
        ]);
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
    }

    public function store()
    {
        $this->validate();

        MatakuliahModel::create([
            'kode' => $this->kode,
            'nama_matakuliah' => $this->nama,
            'sks' => $this->sks,
            'semester' => $this->semester,
            'prodi_id' => $this->prodi_id,
            'fakultas_id' => $this->fakultas_id,
            'dosen' => $this->dosen,
            'status' => $this->status
        ]);

        $this->resetForm();
        session()->flash('message', 'Mata kuliah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $matakuliah = MatakuliahModel::findOrFail($id);
        $this->editingId = $id;
        $this->kode = $matakuliah->kode;
        $this->nama = $matakuliah->nama_matakuliah;
        $this->sks = $matakuliah->sks;
        $this->semester = $matakuliah->semester;
        $this->prodi_id = $matakuliah->prodi_id;
        $this->fakultas_id = $matakuliah->fakultas_id;
        $this->dosen = $matakuliah->dosen;
        $this->status = $matakuliah->status;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();

        MatakuliahModel::find($this->editingId)->update([
            'kode' => $this->kode,
            'nama_matakuliah' => $this->nama,
            'sks' => $this->sks,
            'semester' => $this->semester,
            'prodi_id' => $this->prodi_id,
            'fakultas_id' => $this->fakultas_id,
            'dosen' => $this->dosen,
            'status' => $this->status
        ]);

        $this->resetForm();
        session()->flash('message', 'Mata kuliah berhasil diperbarui.');
    }

    public function delete($id)
    {
        MatakuliahModel::find($id)->delete();
        session()->flash('message', 'Mata kuliah berhasil dihapus.');
    }

    private function resetForm()
    {
        $this->kode = '';
        $this->nama = '';
        $this->sks = '';
        $this->semester = '';
        $this->prodi_id = '';
        $this->fakultas_id = '';
        $this->dosen = '';
        $this->status = '';
        $this->editingId = null;
        $this->isEditing = false;
    }
}
