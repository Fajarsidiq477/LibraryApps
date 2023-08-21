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
        Schema::dropIfExists('fine');
        Schema::create('fine', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('lend_id');
            $table->float('fine_amount');
            $table->float('paid_amount');
            $table->enum('fine_status', [0, 1]); // 0 = Belum, 1 = Lunas
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fine');
    }
};
