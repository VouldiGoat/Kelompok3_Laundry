<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {

            // Mengubah ENUM menjadi VARCHAR agar
            // metode BCA dan E-WALLET bisa disimpan terpisah
            $table->string('payment_method', 30)->change();

            // Lokasi file bukti pembayaran
            $table->string('payment_proof')->nullable();

            // Status verifikasi pembayaran
            $table->string('payment_status', 40)
                ->default('MENUNGGU_VERIFIKASI');

            // Belum dianggap lunas sebelum diverifikasi admin
            $table->timestamp('paid_at')->nullable()->change();

        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn([
                'payment_proof',
                'payment_status',
            ]);
        });

        // payment_method sengaja tetap VARCHAR agar
        // pilihan BCA dan E-WALLET tidak kehilangan data.
    }
};
