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
        Schema::dropIfExists('tbl_buku');
        Schema::create('tbl_buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('judul_buku');
            $table->string('judul_buku_asli');
            $table->string('kategori');
            $table->string('penulis');
            $table->string('editor');
            $table->string('penerjemah');
            $table->string('bahasa');
            $table->integer('thn_terbit');
            $table->integer('jml_hlm');
            $table->integer('volume');
            $table->binary('cover_depan');
            $table->binary('cover_belakang');
            $table->enum('kelayakan', ['Layak', 'Tidak Layak']);
            $table->enum('jenis', ['R', 'Non R']);
            $table->enum('status_buku', ['Tersedia', 'Dipinjam']);
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_buku');
    }
};
