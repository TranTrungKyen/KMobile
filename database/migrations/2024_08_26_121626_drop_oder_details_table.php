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
        Schema::dropIfExists('oder_details');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('oder_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_detail_id');
            $table->integer('qty');
            $table->double('price');
            $table->double('total_price');
            $table->timestamps();
        });
    }
};
