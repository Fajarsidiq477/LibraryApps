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
            $table->string('kode_buku', 20)->unique();
            $table->string('judul_buku');
            $table->string('judul_buku_asli');
            $table->string('kategori');
            $table->string('penulis')->nullable();
            $table->string('editor')->nullable();
            $table->string('penerjemah')->nullable();
            $table->string('bahasa');
            $table->string('penerbit')->nullable();
            $table->integer('thn_terbit')->nullable();
            $table->integer('jml_hlm');
            $table->integer('volume')->nullable();
            $table->longtext('sinopsis')->nullable();
            $table->string('cover_depan');
            $table->string('cover_belakang');
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
