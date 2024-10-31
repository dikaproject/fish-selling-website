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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('product_category_id');
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');

            $table->string('name');
            $table->text('slug');
            $table->text('description');
            $table->string('thumbnail')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price', 15, 2);
            $table->integer('stock');
            $table->enum('unit', ['gram', 'kilogram', 'ton'])->default('gram');
            $table->enum('status', ['paid', 'unpaid'])->nullable();
            $table->enum('status_delivery', ['ready', 'sent', 'delivered'])->nullable();
            $table->boolean('is_favorite')->default(false);
            $table->boolean('is_active')->default(true);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
