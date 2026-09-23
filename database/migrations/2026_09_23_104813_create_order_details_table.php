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
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('order_detail_id');

            $table->unsignedBigInteger('orders_id');
            $table->unsignedBigInteger('services_id');

            $table->enum('orders_status', [
                'PENDING',
                'COMPLETE'
            ]);

            $table->string('order_detail_dok', 50);

            $table->foreign('orders_id')
                ->references('orders_id')
                ->on('orders')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

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
        Schema::dropIfExists('order_details');
    }
};
