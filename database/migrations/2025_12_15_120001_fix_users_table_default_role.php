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
        // Update existing users with 'writer' role to 'faculty'
        DB::table('users')
            ->where('role', 'writer')
            ->update(['role' => 'faculty']);
        
        // Note: We can't change default values in SQLite easily, 
        // but the update above ensures existing records are correct
        // New records will use the seeder which sets proper roles
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert users with 'faculty' role back to 'writer' (except admins)
        DB::table('users')
            ->where('role', 'faculty')
            ->update(['role' => 'writer']);
    }
};
