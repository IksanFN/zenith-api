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
        Schema::create('store_ballance_histories', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->foreignId('store_ballance_id')->constrained('store_ballances')->cascadeOnDelete();
            $table->enum('type', ['income', 'withdrawal'])->default('income');
            $table->uuid('reference_id')->nullable();
            $table->string('reference_type')->nullable();
            $table->decimal('amount', 26, 2)->default(0);
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_ballance_histories');
    }
};
