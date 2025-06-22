<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('matakuliah', function (Blueprint $table) {
            $table->string('status')->after('dosen'); // tambahkan kolom status setelah dosen
        });
    }

    public function down(): void
    {
        Schema::table('matakuliah', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
