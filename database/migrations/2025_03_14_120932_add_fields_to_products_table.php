<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('composition')->nullable(); // Add nullable 'composition' field
            $table->text('conseil')->nullable();    // Add nullable 'conseil' field
            $table->string('conditionnement')->nullable(); // Add nullable 'conditionnement' field
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['composition', 'conseil', 'conditionnement']);
        });
    }
}
