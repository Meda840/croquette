<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ public function up() {
    Schema::create('command', function (Blueprint $table) { // Table name is 'command'
        $table->uuid('id')->primary();
        $table->string('name');
        $table->uuid('product_id');
        $table->foreign('product_id') ->references('id')
        ->on('products')
        ->onDelete('cascade');        $table->string('tele');
        $table->string('email')->unique();
        $table->string('code_postal');
        $table->text('address')->nullable();
        $table->text('message');
        $table->string('title');
        $table->decimal('price', 10, 2);
        $table->integer('quantity')->default(1);
        $table->enum('status', ['pending', 'confirmed', 'shipped', 'delivered'])->default('pending');
        $table->timestamps();
    });
}

public function down() {
    Schema::dropIfExists('command');
}
};