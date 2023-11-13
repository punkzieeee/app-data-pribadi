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
        Schema::create('data', function (Blueprint $table) {
            $table->string('nik')->primary()->nullable(false)->unique();
            $table->string('nama_lengkap')->nullable(false);
            $table->string('jenis_kelamin');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->string('negara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
