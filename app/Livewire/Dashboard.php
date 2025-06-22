<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Fakultas;
use App\Models\Matakuliah;
use App\Models\Krs;

class Dashboard extends Component
{
    public function render()
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalProdi = Prodi::count();
        $totalFakultas = Fakultas::count();
        $totalMatakuliah = Matakuliah::count();

        return view('livewire.dashboard', [
            'totalMahasiswa' => $totalMahasiswa,
            'totalProdi' => $totalProdi,
            'totalFakultas' => $totalFakultas,
            'totalMatakuliah' => $totalMatakuliah,
            // Ambil 5 aktivitas KRS terbaru
            'recentKrs' => Krs::with(['mahasiswa', 'matakuliah'])
                ->latest()
                ->take(5)
                ->get(),
            'recentMahasiswa' => Mahasiswa::latest()->take(5)->get(),
            'recentMatakuliah' => Matakuliah::latest()->take(5)->get(),
        ]);
    }
} 