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
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('color')->nullable();
            $table->string('details')->nullable();
            $table->string('detailsColor')->nullable();
            $table->string('description')->nullable();
            $table->string('offerText')->nullable();
            $table->string('offerLink')->nullable();
            $table->text('image')->nullable();
            $table->integer('firstCategory')->nullable();
            $table->integer('secondCategory')->nullable();
            $table->integer('thirdCategory')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_settings');
    }
};
