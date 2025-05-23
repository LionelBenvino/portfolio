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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("title")->nullable();
            $table->string("username")->nullable();
            $table->string("linkedin_url")->nullable();
            $table->string("github_url")->nullable();
            $table->string("youtube_url")->nullable();
            $table->string("hero_gif")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("pronouns")->nullable();
            $table->string("location")->nullable();
            $table->string("languages")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
