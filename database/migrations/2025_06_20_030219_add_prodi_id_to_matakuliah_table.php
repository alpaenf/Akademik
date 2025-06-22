<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('matakuliah', function (Blueprint $table) {
            $table->unsignedBigInteger('prodi_id')->after('semester');

            // Opsional: kalau ada relasi ke tabel prodi
            // $table->foreign('prodi_id')->references('id')->on('prodi')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('matakuliah', function (Blueprint $table) {
            $table->dropColumn('prodi_id');
        });
    }
};
