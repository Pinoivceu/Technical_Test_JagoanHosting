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
        Schema::create('warga', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['laki', 'perempuan']);
            $table->foreignId('nomor_rumah')->nullable()->constrained('rumah', 'nomor')->nullOnDelete();
            $table->enum('status_hunian', ['kontrak', 'tetap']);
            $table->enum('status_perkawinan', ['menikah', 'lajang', 'bercerai']);
            $table->string('no_telepon');
            $table->string('foto_ktp');
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
