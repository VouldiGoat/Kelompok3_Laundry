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
            $table->bigIncrements('orders_id');

            $table->unsignedBigInteger('services_id');

            $table->string('nama_pemesan', 100);
            $table->string('addresses', 150);
            $table->date('pickup_date');
            $table->string('satuan', 20);
            $table->time('pickup_time');
            $table->date('delivery_date')->nullable();
            $table->decimal('subtotal', 12, 2);
            $table->decimal('delivery_fee', 12, 2);
            $table->decimal('total', 12, 2);

            $table->text('notes')->nullable();

            $table->timestamp('created_at')->useCurrent();
            
            $table->timestamp('updated_at')
                ->useCurrent()
                ->useCurrentOnUpdate();

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
