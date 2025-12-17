<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penilaian_layanan', function (Blueprint $table) {
            $table->bigIncrements('penilaian_id'); // Sesuai skema gambar

            // Foreign Key ke tabel pengaduan (harus unik karena 1 pengaduan hanya 1 kali dinilai)
            $table->unsignedBigInteger('pengaduan_id')->unique();
            $table->foreign('pengaduan_id')->references('pengaduan_id')->on('pengaduan')->onDelete('cascade');

            $table->integer('rating')->comment('Nilai 1-5');
            $table->text('komentar')->nullable(); // Sesuai skema gambar: komentar

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaian_layanan');
    }
};
