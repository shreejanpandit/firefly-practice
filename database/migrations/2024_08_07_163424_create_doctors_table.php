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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 70)->unique();
            $table->string('contact', 20);
            $table->string('password', 255);
            $table->string('qualification');
            $table->string('expertise');
            $table->string('experience');
            $table->string('image')->nullable();
            $table->integer('no_of_patient')->default(0);
            $table->enum('shift', ['morning', 'day', 'evening', 'night']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
