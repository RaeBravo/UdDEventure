<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('writers', 'faculties');
        
        // Update users table to change writer role to faculty
        DB::table('users')
            ->where('role', 'writer')
            ->update(['role' => 'faculty']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('faculties', 'writers');
        
        // Revert users table role changes
        DB::table('users')
            ->where('role', 'faculty')
            ->update(['role' => 'writer']);
    }
};
