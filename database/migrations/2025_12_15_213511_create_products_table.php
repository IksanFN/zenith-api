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
            $table->foreignUuid('store_id')->constrained('stores', 'id')->cascadeOnDelete();
            $table->foreignUuid('product_category_id')->constrained('product_categories', 'id')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->enum('condition', ['new', 'secondhand'])->default('new');
            $table->decimal('price', 26, 2)->default(0);
            $table->decimal('weight', 26, 2)->default(0);
            $table->unsignedInteger('stock')->default(0);
            $table->decimal('discount_price', 26, 2)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
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
