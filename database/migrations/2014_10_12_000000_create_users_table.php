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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedInteger('role_id');
            $table->string('phone', 20)->nullable();
            $table->string('address', 255)->nullable();
            $table->tinyInteger('gender')->nullable()->comment('0 is female, 1 is male');
            $table->string('avatar', 255)->nullable();
            $table->text('description')->nullable();
            $table->boolean('active')->default(true)->comment('true is active , false is not active');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
