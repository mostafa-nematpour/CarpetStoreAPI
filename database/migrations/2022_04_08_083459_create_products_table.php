<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('short_name');
            $table->string('name');
            $table->unsignedBigInteger('price');
            $table->unsignedInteger('number');
            $table->text('thumbnail');
            $table->string('slug', 128)->unique();
            $table->text('description')->nullable();
            $table->string('material');
            $table->unsignedBigInteger('discount')->nullable();

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
