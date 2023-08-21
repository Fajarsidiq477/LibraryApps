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
        Schema::dropIfExists('book');
        Schema::create('book', function (Blueprint $table) {
            $table->id('id');
            $table->string('book_code', 10)->unique();
            $table->string('title');
            $table->string('author')->nullable();
            $table->string('editor')->nullable();
            $table->string('translator')->nullable();
            $table->string('language')->nullable();
            $table->string('publisher')->nullable();
            $table->integer('publication_year')->nullable();
            $table->integer('page')->nullable();
            $table->integer('volume')->nullable();
            $table->longtext('synopsis')->nullable();
            $table->string('cover')->nullable();
            $table->enum('type', [0, 1]); // 0 = R, 1 = Non R
            $table->enum('book_status', [0, 1, 2]);  // 0 = Tersedia, 1 = Dipinjam, 2 = Hilang
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
