<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('matakuliah', function (Blueprint $table) {
            $table->unsignedBigInteger('fakultas_id')->after('prodi_id');

            // Opsional: kalau ada relasi ke tabel fakultas
            // $table->foreign('fakultas_id')->references('id')->on('fakultas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('matakuliah', function (Blueprint $table) {
            $table->dropColumn('fakultas_id');
        });
    }
};
