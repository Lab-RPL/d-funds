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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->bigIncrements('id_pengajuan');
            $table->string('tentang');
            $table->string('unit_kerja');
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_user');
            $table->text('catatan')->nullable();
            $table->boolean('IsDelete')->default(0);
            $table->boolean('IsApproved')->default(0);

            $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
