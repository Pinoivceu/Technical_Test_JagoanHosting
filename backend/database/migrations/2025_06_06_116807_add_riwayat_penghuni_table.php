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
        Schema::create('riwayat_penghuni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_warga')->nullable()->constrained('warga')->onDelete('cascade');
            $table->foreignId('nomor_rumah')->nullable()->constrained('rumah', 'nomor')->OnDelete('cascade');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar')->nullable(); ;
            $table->boolean('status')->default(true);
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
