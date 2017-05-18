<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryObject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {

            $table->integer('provider_id');

            $table->string('name');

            $table->string('shortName');

            $table->text('description');

            $table->dateTime('entryDate');

            $table->timestamp('last_update');

            $table->integer('creationUserId');

            $table->integer('lastupdateUserId');

            $table->enum('markedForDeletion', array('n','y'));

            $table->datetime('markedForDeletionDate');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("providers");
    }
}