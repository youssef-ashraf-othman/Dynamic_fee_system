<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeePercentagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_percentages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fee_preset_id')->constrained()->onDelete('cascade'); // foreign key to fee_presets table
            $table->foreignId('service_id')->constrained()->onDelete('cascade'); // foreign key to services table
            $table->foreignId('threshold_id')->constrained()->onDelete('cascade'); // foreign key to thresholds table
            $table->decimal('percentage', 5, 2); 
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee_percentages');
    }
}
