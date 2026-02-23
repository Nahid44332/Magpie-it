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
        Schema::create('team_intros', function (Blueprint $table) {
            $table->id();
            $table->string('section_heading');
            $table->string('intro_description');
            $table->integer('team_mamber_count');
            $table->integer('departments_count');
            $table->integer('countries_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_intros');
    }
};
