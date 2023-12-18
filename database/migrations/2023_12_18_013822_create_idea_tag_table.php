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
        Schema::create('idea_tag', function (Blueprint $table) {
            $table->foreignId('idea_id')->constrained('ideas');
            $table->foreignId('idea_tags_id')->constrained('idea_tags');
            $table->primary(['idea_id','idea_tags_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idea_tag');
    }
};
