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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->nullable();
            $table->text('favicon')->nullable();
            $table->string('title')->nullable();
            $table->string('tagline')->nullable();
            $table->string('phone')->nullable();
            $table->string('locationLink')->nullable();
            $table->string('offerOne')->nullable();
            $table->string('offerOneLink')->nullable();
            $table->string('offerTwo')->nullable();
            $table->string('offerTwoLink')->nullable();
            $table->string('hotline')->nullable();
            $table->text('paymentImage')->nullable();
            $table->string('AppStoreLink')->nullable();
            $table->string('googleStoreLink')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
