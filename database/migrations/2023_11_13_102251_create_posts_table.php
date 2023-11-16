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
        // Schema::create('posts', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->string('Slug')->unique();
        //     $table->longText('content');
        //     $table->timestamps();
        // });
        
        if (!Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table) {
                // Votre définition de table
                $table->id();
                $table->string('title');
                $table->string('Slug')->unique();
                $table->longText('content');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
