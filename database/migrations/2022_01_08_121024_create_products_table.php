<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->bigInteger('subcat_id');
            $table->string('name');
            $table->string('slug');
            $table->longText('small_description');
            $table->string('image');

            $table->string('high_heading');
            $table->longText('highlights');
            $table->string('des_heading');
            $table->longText('description');
            $table->string('det_heading');
            $table->longText('details');


            $table->string('MRP');
            $table->string('price');
            $table->integer('quantity');
            $table->tinyInteger('status');
            $table->tinyInteger('trending');

            $table->tinyInteger('new_arrivals');
            $table->tinyInteger('offers_pr');

            $table->mediumText('meta_title');
            $table->mediumText('meta_description');
            $table->mediumText('meta_keyword');
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
}
