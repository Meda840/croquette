<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('prices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_id');
            $table->foreign('product_id') ->references('id')
            ->on('products')
            ->onDelete('cascade');
            $table->integer('quantity'); // Number of bags
            $table->decimal('price', 8, 2); // Price in euros
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('prices');
    }
};
