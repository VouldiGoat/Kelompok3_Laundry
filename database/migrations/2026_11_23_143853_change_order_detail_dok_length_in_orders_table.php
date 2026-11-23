<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            // Memperbesar kapasitas penyimpanan path dokumen
            $table->string('order_detail_dok', 255)
                ->nullable()
                ->change();

        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            // Mengembalikan ukuran kolom ke 50 karakter
            $table->string('order_detail_dok', 50)
                ->nullable()
                ->change();

        });
    }
};
