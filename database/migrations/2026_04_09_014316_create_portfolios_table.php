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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->string('rating')->nullable();
            $table->string('main_image');
            $table->text('description'); // Short description
            $table->text('overview')->nullable();
            $table->text('challenge')->nullable();
            $table->text('solution')->nullable();
            $table->string('date')->nullable();
            $table->string('company_name')->nullable();
            $table->string('live_link')->nullable();
            $table->string('github_link')->nullable();
            $table->json('technologies')->nullable(); // Array of techs
            $table->json('features')->nullable();     // Array of features
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
