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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nomor_rumah')->nullable()->constrained('rumah', 'nomor')->nullOnDelete();;
            $table->integer('total');
            $table->enum('status', ['belum', 'lunas']);
            $table->date('tanggal_terbit');
            $table->date('tanggal_pembayaran')->nullable();
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
