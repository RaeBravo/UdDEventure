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
        Schema::table('news', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['writer_id']);
            
            // Rename the column
            $table->renameColumn('writer_id', 'faculty_id');
            
            // Rename the writer_name column to faculty_name
            $table->renameColumn('writer_name', 'faculty_name');
        });
        
        // Add the foreign key constraint back separately
        Schema::table('news', function (Blueprint $table) {
            $table->foreign('faculty_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['faculty_id']);
            
            // Rename columns back
            $table->renameColumn('faculty_id', 'writer_id');
            $table->renameColumn('faculty_name', 'writer_name');
        });
        
        // Add the foreign key constraint back separately
        Schema::table('news', function (Blueprint $table) {
            $table->foreign('writer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
