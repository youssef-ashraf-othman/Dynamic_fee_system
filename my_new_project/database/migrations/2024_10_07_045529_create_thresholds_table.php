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
      // Migration for Threshold table (simplified)
        Schema::create('thresholds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('preset_id');
            $table->decimal('min_value');
            $table->decimal('max_value');
            $table->decimal('fee_percentage');
            $table->timestamps();

            $table->foreign('preset_id')->references('id')->on('fee_presets')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thresholds');
    }
};
