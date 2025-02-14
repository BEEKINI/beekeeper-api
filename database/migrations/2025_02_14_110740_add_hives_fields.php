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
        Schema::table('hives', function (Blueprint $table) {
            $table->string('bee_queen_color')->after('longitude')->nullable();
            $table->string('sensor_id')->after('bee_queen_color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hives', function (Blueprint $table) {
            $table->dropColumn('beeQueenColor');
            $table->dropColumn('sensorId');
        });
    }
};
