<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryObjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('public_id');
            $table->string('name', 80);
            $table->string('description', 120);
            $table->integer('material_type_id');
            $table->integer('brand_id');
            $table->integer('model_id');
            $table->integer('location_id');

            //$table->foreign('material_type_id')->references('id')->on('material_type');

            //$table->foreign('brand_id')->references('id')->on('brand_type');

            //$table->foreign('model_id')->references('id')->on('brand_model');

            //$table->foreign('location_id')->references('id')->on('brand');
            $table->integer('quantity');
            $table->double('price');
            $table->integer('moneysourceId');
            $table->integer('provider_id');

            //$table->foreign('moneySourceId')->references('id')->on('brand');

            //$table->foreign('provider_id')->references('id')->on('providers');
            $table->date('date_entrance');
            $table->date('last_update');
            $table->string('picture', 60);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
