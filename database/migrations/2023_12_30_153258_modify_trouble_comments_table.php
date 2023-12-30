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
        Schema::table('trouble_comments', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->change();
            $table->foreignId('trouble_id')->constrained()->cascadeOnDelete()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trouble_comments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['trouble_id']);
            
            $table->foreignId('user_id')->constrained();
            $table->foreignId('trouble_id')->constrained();
        });
    }
};
