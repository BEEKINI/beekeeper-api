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
        Schema::create('darwins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('swarm_parent_id')->nullable()->constrained('swarms')->cascadeOnDelete();
            $table->foreignId('swarm_id')->constrained()->cascadeOnDelete();
            $table->foreignId('swarm_origin_id')->nullable()->constrained('swarms')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('darwins');
    }
};
