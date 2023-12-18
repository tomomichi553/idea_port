<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('trouble_tag', function (Blueprint $table) {
            $table->foreignId('trouble_id')->constrained('troubles');
            $table->foreignId('trouble_tag_id')->constrained('trouble_tags');
            $table->primary(['trouble_id','trouble_tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trouble_tag');
    }
};
