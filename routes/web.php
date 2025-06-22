<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', \App\Livewire\Dashboard::class);
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/mahasiswa', \App\Livewire\Mahasiswa::class)->name('mahasiswa');
    Route::get('/prodi', \App\Livewire\Prodi::class)->name('prodi');
    Route::get('/fakultas', \App\Livewire\Fakultas::class)->name('fakultas');
    Route::get('/matakuliah', \App\Livewire\Matakuliah::class)->name('matakuliah');
    Route::get('/krs', \App\Livewire\KrsForm::class)->name('krs');
    Route::get('/rekap', \App\Livewire\DaftarMahasiswa::class)->name('rekap');
});

require __DIR__.'/auth.php';
