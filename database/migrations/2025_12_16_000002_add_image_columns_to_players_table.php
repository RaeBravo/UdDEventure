<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('players', function (Blueprint $table) {
            // Add missing columns
            if (!Schema::hasColumn('players', 'player_image')) {
                $table->longText('player_image')->nullable();
            }
            
            if (!Schema::hasColumn('players', 'whiteform_image')) {
                $table->longText('whiteform_image')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropColumn(['player_image', 'whiteform_image']);
        });
    }
};
