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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('full_desc')->nullable();
            $table->text('short_desc')->nullable();
            $table->double('price',10,2);
            $table->double('compare_price',10,2)->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('sub_category_id')->nullable()->constrained();
            $table->foreignId('brand_id')->nullable()->constrained();
            $table->enum('is_featured',['YES','NO'])->default('NO');
            $table->string('sku');
            $table->string('barcode');
            $table->enum('track_qty',['YES','NO'])->default('YES');
            $table->integer('qty')->nullable();
            $table->text('featured_image')->nullable();
            $table->text('image_gallery')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
