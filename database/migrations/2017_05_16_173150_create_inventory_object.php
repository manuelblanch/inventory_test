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
        Schema::create('inventory', function (Blueprint $table) {

            $table->increments('id');

            $table->string('publicID');

            $table->string('externalID');

            $table->integer('externalIDType');

            $table->string('name');

            $table->string('shortName');

            $table->text('description');

            $table->integer('parent');

            $table->integer('materialID');

            $table->integer('brandID');

            $table->integer('modelID');

            $table->dateTime('manualYearManufacture');

            $table->dateTime('entryDate');

            $table->dateTime('manualEntryDate');

            $table->timestamp('last_update');

            $table->datetime('manualLastUpdate');

            $table->integer('creationUserID');

            $table->integer('lastupdateUserId');

            $table->integer('location');

            $table->smallInteger('quantityInStock');

            $table->double('price');

            $table->integer('moneySourceId');

            $table->integer('providerId');

            $table->enum('preservationState', array('Good','Regular','Bad'));

            $table->integer('study_id');

            $table->enum('markedForDeletion', array('n','y'));

            $table->dateTime('markedForDeletionDate');

            $table->string('file_url');

            $table->integer('mainOrganizationalUnitId');

            $table->string('title');

            $table->text('description');

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
        Schema::drop("inventory");
    }
}
