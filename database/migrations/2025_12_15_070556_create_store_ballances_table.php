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
        Schema::create('store_ballances', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();
            $table->decimal('amount', 26, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_ballances');
    }
};
