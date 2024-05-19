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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['hotel', 'resort', 'villa']);
            $table->string('address');
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->string('gallery')->nullable();
            $table->float('rating')->nullable();
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
