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
        Schema::create('orders', function (Blueprint $table) {

            // Primary Key
            $table->bigIncrements('orders_id');

            // Foreign Key ke Services
            $table->unsignedBigInteger('services_id');

            // Data pelanggan
            $table->string('nama_pemesan', 100);
            $table->string('addresses', 150);

            // Jadwal pickup dan delivery
            $table->date('pickup_date');
            $table->string('satuan', 20);
            $table->time('pickup_time');
            $table->date('delivery_date')->nullable();

            // Informasi harga
            $table->decimal('subtotal', 12, 2);
            $table->decimal('delivery_fee', 12, 2);
            $table->decimal('total', 12, 2);

            // Catatan pelanggan
            $table->text('notes')->nullable();

            // Status pesanan (sebelumnya di order_details)
            $table->enum('orders_status', [
                'PENDING',
                'COMPLETE'
            ])->default('PENDING');

            // Dokumen pesanan (sebelumnya di order_details)
            $table->string('order_detail_dok', 50)->nullable();

            // Timestamp
            $table->timestamp('created_at')->useCurrent();

            $table->timestamp('updated_at')
                ->useCurrent()
                ->useCurrentOnUpdate();

            // Relasi Foreign Key
            $table->foreign('services_id')
                ->references('services_id')
                ->on('services')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};