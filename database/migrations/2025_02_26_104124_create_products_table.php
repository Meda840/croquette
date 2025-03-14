<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('weight', 5, 2)->default(20); // Default weight in kg
            $table->integer('pallet_quantity')->default(39); // Number of bags per pallet
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('products');
    }
};