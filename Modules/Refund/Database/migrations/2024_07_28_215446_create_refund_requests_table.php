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
        Schema::create('refund_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('buyer_id')->default(0);
            $table->integer('seller_id')->default(0);
            $table->integer('order_id')->default(0);
            $table->text('note')->default(0);
            $table->decimal('refund_amount', 8, 2)->default(0.00);
            $table->string('status')->default('pending')->comment('pending,rejected,approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refund_requests');
    }
};
