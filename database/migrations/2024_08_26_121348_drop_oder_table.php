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
        Schema::dropIfExists('oders');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('oders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('address', 255);
            $table->string('user_name', 50);
            $table->string('phone', 20);
            $table->string('email', 255);
            $table->text('note');
            $table->string('status', 20);
            $table->timestamps();
        });
    }
};
