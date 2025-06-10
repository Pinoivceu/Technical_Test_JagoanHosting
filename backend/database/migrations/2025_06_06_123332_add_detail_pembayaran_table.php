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
        Schema::create('detail_pembayaran', function (Blueprint $table) {
            $table->id(); // bigint unsigned AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('id_pembayaran')->nullable(); // FK ke pembayaran
            $table->unsignedBigInteger('id_iuran')->nullable(); // FK ke iuran
            $table->integer('jumlah');
            $table->timestamps(); // created_at dan updated_at

            // Foreign keys
            $table->foreign('id_pembayaran')
                ->references('id')
                ->on('pembayaran')
                ->onDelete('cascade');

            $table->foreign('id_iuran')
                ->references('id')
                ->on('iuran')
                ->onDelete('cascade');
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
