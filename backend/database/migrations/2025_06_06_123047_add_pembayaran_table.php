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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id(); // bigint unsigned AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('id_pembayar'); // foreign key ke warga
            $table->unsignedBigInteger('nomor_rumah')->nullable(); // foreign key ke rumah
            $table->integer('total');
            $table->date('tanggal_pembayaran')->nullable();
            $table->timestamps(); // created_at dan updated_at

            // Foreign keys
            $table->foreign('id_pembayar')
                ->references('id')
                ->on('warga')
                ->onDelete('cascade');

            $table->foreign('nomor_rumah')
                ->references('nomor')
                ->on('rumah')
                ->onDelete('set null');
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
