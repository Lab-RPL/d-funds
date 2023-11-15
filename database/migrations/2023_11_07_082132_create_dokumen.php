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
        Schema::create('dokumen', function (Blueprint $table) {
            $table->bigIncrements('id_dokumen');
            $table->string('nama_dokumen');
            $table->string('nama_file');
            $table->unsignedBigInteger('id_pengajuan');
            $table->unsignedBigInteger('id_disc');
            $table->boolean('IsDelete')->default(0);
            $table->foreign('id_pengajuan')->references('id_pengajuan')->on('pengajuan');
            $table->foreign('id_disc')->references('id_disc')->on('discuss');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen');
    }
};
