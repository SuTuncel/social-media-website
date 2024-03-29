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
        Schema::create('group_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('group_id')->constrained('groups');
            $table->foreignId('deleted_by')->constrained('users');
            $table->timestamp('deleted_at')->nullable();
            $table->string('status', 25);
            $table->string('role', 25);
            $table->string('token', 1024)->nullable();
            $table->timestamp('token_expired_at')->nullable();
            $table->timestamp('token_used_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_users');
    }
};
