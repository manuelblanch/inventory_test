<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('public_id');
            $table->string('name', 80);
            $table->string('description', 120);
            $table->integer('material_type_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->integer('quantity');
            $table->double('price');
            $table->integer('moneysourceId')->unsigned();
            $table->integer('provider_id')->unsigned();
            $table->date('date_entrance');
            $table->date('last_update');
            $table->string('picture', 60);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('inventories', function ($table) {
            $table->foreign('material_type_id')->references('id')->on('material_type')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('brand_model')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('location')->onDelete('cascade');
            $table->foreign('moneySourceId')->references('id')->on('moneySource')->onDelete('cascade');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
