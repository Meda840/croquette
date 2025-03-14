<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {

        Schema::create('product_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_id');
            $table->foreign('product_id') ->references('id')
            ->on('products')
            ->onDelete('cascade');
            $table->string('type'); 
            $table->decimal('value', 8, 2); 
            $table->timestamps();
        });
        
    }

    public function down() {
        Schema::dropIfExists('product_infos');
    }
};