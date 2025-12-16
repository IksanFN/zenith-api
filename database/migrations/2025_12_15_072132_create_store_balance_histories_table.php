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
        Schema::create('store_balance_histories', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->foreignUuid('store_balance_id')->constrained('store_balances', 'id')->cascadeOnDelete();
            $table->enum('type', ['income', 'withdrawal'])->default('income')->index();
            $table->uuid('reference_id')->nullable();
            $table->string('reference_type')->nullable()->index();
            $table->decimal('amount', 26, 2)->default(0)->index();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_balance_histories');
    }
};
