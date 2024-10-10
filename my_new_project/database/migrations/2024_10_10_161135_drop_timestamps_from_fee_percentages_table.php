<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTimestampsFromFeePercentagesTable extends Migration
{
    public function up()
    {
        Schema::table('fee_percentages', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }

    public function down()
    {
        Schema::table('fee_percentages', function (Blueprint $table) {
            $table->timestamps(); // Re-add the timestamps if you rollback
        });
    }
}
