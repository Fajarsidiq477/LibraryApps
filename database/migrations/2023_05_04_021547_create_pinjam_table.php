<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('tbl_pinjam');
        Schema::create('tbl_pinjam', function (Blueprint $table) {
            $table->id('id_pinjam');
            $table->foreignId('id_user');
            $table->foreignId('id_buku');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali')->nullable();
            $table->enum('status_pinjam', ['Pinjam', 'Selesai', 'Hilang']);
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pinjam');
    }
};
