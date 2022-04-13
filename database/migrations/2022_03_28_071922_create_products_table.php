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
            $table->string('title');
            $table->string('author');
            $table->unsignedSmallInteger('year')->nullable();
            $table->string('publisher')->nullable();
            $table->string('place')->nullable();
            $table->string('isbn')->nullable();
            $table->string('series')->nullable();
            $table->decimal('price');
            $table->unsignedSmallInteger('stock')->default(0);
            $table->boolean('highlighted')->default(false);
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
