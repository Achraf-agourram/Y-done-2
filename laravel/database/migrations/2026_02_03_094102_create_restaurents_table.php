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
        Schema::create('restaurents', function (Blueprint $table) {
            $table->id();
            $table->string('restaurentName');
            $table->string('location');
            $table->integer('capacity');
            $table->time('openingTime');
            $table->time('closingTime');
            $table->boolean('isActive');
            $table->timestamps();

            $table->foreignId('owner_id')->constrained('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurents');
    }
};
