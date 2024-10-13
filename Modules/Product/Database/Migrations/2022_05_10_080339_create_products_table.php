<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->nullable()->on('brands')->references('id')->onUpdate('cascade')->onDelete('cascade');
            
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->text('desc_ar')->nullable();
            $table->text('desc_en')->nullable();
            $table->string('code')->nullable();
            $table->integer('arrangement')->default(0);
            $table->enum('VAT', ['inclusive', 'exclusive'])->default('exclusive')->nullable();
            $table->boolean('status')->default(1);

            $table->decimal('discount', 8, 3)->default(0)->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();

            $table->timestamps();
        });
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('arrangement')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->on('categories')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->on('products')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('product_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->on('products')->references('id')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('size_id')->nullable();
            $table->foreign('size_id')->nullable()->on('sizes')->references('id')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')->nullable()->on('colors')->references('id')->onUpdate('cascade')->onDelete('cascade');

            $table->decimal('price', 8, 3)->default(0.000);
            $table->integer('quantity')->default(0);

            $table->timestamps();
        });

        Schema::create('product_favourites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->on('clients')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->on('products')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->on('products')->references('id')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->on('clients')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->on('products')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('rate', [1, 2, 3, 4, 5]);
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_reviews');
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('product_favourites');
        Schema::dropIfExists('product_items');
        Schema::dropIfExists('product_categories');
        Schema::dropIfExists('products');
    }
}