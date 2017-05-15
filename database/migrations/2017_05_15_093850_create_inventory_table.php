<?php

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;


class CreateItemsTable extends Migration

{


    public function up()

    {

        Schema::create('inventory', function (Blueprint $table) {

            $table->increments('id_public');

            $table->increments('id_extern');

            $table->string('tipus_id_extern');

            $table->string('nom');

            $table->string('title');

            $table->text('description');

            $table->timestamps();

        });

    }


    public function down()

    {

        Schema::drop("items");

    }

}
