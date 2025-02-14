<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('apiary_id')->constrained('apiaries')->cascadeOnDelete();
            $table->boolean('is_finished')->default(false);
            $table->date('closed_at')->nullable();
            $table->date('date_start');
            $table->date('date_end');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};
