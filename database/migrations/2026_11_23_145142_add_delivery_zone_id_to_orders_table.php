<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            // Zona yang dipilih pelanggan
            // Nullable agar data pesanan lama tetap aman
            $table->unsignedBigInteger('delivery_zone_id')
                ->nullable()
                ->after('services_id');

            $table->foreign('delivery_zone_id')
                ->references('delivery_zones_id')
                ->on('delivery_zones')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['delivery_zone_id']);
            $table->dropColumn('delivery_zone_id');
        });
    }
};
