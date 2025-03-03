<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('swarm_states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('swarm_id')->constrained()->cascadeOnDelete();
            $table->float('temperature');
            $table->float('humidity');
            $table->float('weight');
            $table->float('sound_level');
            $table->string('sound_signature');
            $table->float('vibration_level');
            $table->float('co2_level')->nullable();
            $table->string('activity_level');
            $table->string('detected_state');
            $table->boolean('alert');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('swarm_states');
    }
};
