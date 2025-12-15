<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('borrow_requests', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained('users')->cascadeOnDelete();
            $table->timestamp('borrowed_at')->nullable()->after('returned_at');
            $table->timestamp('return_due_date')->nullable()->after('borrowed_at');
            
            // Make existing student fields nullable since we're now using user_id
            $table->string('student_name')->nullable()->change();
            $table->string('student_id')->nullable()->change();
            $table->string('email')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('borrow_requests', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'borrowed_at', 'return_due_date']);
        });
    }
};
