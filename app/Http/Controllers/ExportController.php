<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    public function exportPDF()
    {
        $mahasiswa = Mahasiswa::with(['prodi', 'krs.matakuliah'])->get();
        
        $pdf = PDF::loadView('exports.rekap-sks', [
            'mahasiswa' => $mahasiswa,
            'title' => 'Rekap SKS Mahasiswa'
        ]);

        return $pdf->download('rekap-sks-mahasiswa.pdf');
    }
} 