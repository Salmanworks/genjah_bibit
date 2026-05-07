<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('subcategory_id')->nullable()->constrained();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('scientific_name')->nullable();
            $table->text('description');
            $table->text('care_instructions')->nullable();
            $table->decimal('price', 12, 2);
            $table->decimal('original_price', 12, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->string('size')->nullable();
            $table->string('weight')->nullable();
            $table->string('pot_size')->nullable();
            $table->integer('age_months')->nullable();
            $table->string('origin')->nullable();
            $table->string('main_image');
            $table->json('gallery_images')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_bestseller')->default(false);
            $table->boolean('is_new_arrival')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('view_count')->default(0);
            $table->integer('sold_count')->default(0);
            $table->decimal('rating', 2, 1)->default(0);
            $table->integer('review_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
