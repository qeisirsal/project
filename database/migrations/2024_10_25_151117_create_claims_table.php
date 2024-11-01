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
        Schema::create('claims', function (Blueprint $table) {
            $table->id(); // Kolom ID untuk primary key
            $table->unsignedBigInteger('patient_id'); // Foreign key untuk pasien
            $table->string('nama_lengkap'); // Nama lengkap pasien
            $table->string('no_rm'); // Nomor Rekam Medis
            $table->string('no_bpjs'); // Nomor BPJS
            $table->string('no_sep'); // Nomor SEP
            $table->string('kelas_pasien'); // Kelas pasien
            $table->date('tanggal'); // Tanggal klaim
            $table->text('alamat'); // Alamat pasien
            $table->decimal('klaim', 12, 2); // Jumlah klaim
            $table->string('diagnosa'); // Diagnosa pasien
            $table->timestamps(); // Kolom untuk created_at dan updated_at

            // Definisi foreign key
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims'); // Menghapus tabel jika rollback
    }
};
