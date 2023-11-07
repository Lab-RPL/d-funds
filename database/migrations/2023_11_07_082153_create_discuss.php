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
        Schema::create('discuss', function (Blueprint $table) {
            $table->bigIncrements('id_disc');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_pengajuan');
            $table->text('isi');
            $table->string('tambah_berkas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discuss');
    }
};
