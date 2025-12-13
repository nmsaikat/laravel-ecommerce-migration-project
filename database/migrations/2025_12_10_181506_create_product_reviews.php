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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('description', 1000);
            $table->string('email', 200);
            $table->unsignedBigInteger('product_id');

            // Relationship to profiles table
            $table->foreign('email')->references('email')->on('profiles')
                ->restrictOnDelete()->cascadeOnUpdate();

            // Relationship to products table
            $table->foreign('product_id')->references('id')->on('products')
                ->restrictOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
