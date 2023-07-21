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
        Schema::dropIfExists('tbl_user');
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->id('nim');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('number');
            $table->enum('role', ['Super Admin', 'Admin', 'Member']);
            $table->string('profile_picture');
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_user');
    }
};
