<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('author');
            $table->decimal('price');
            $table->unsignedSmallInteger('stock')->default(0);
            $table->boolean('highlighted')->default(false);
            $table->unsignedSmallInteger('year')->nullable();
            $table->string('publisher')->nullable();
            $table->string('place')->nullable();
            $table->string('isbn')->nullable();
            $table->string('series')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
