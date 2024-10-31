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
            $table->uuid('id')->primary();
            $table->uuid('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->string('user_wallet_address');
            $table->string('crypto_currency'); // ETH, BTC, USDT, TON
            $table->decimal('amount', 20, 8); // Bisa untuk crypto yang memiliki pecahan besar
            $table->string('transaction_hash')->nullable();
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->softDeletes();
            $table->timestamps();
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
