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
        Schema::dropIfExists('tbl_denda');
        Schema::create('tbl_denda', function (Blueprint $table) {
            $table->id('id_denda');
            $table->foreignId('id_pinjam');
            $table->float('jml_denda');
            $table->float('jml_bayar');
            $table->enum('status_denda', ['Belum', 'Lunas']);
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_denda');
    }
};
