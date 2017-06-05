<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneySourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moneySource', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('shortName', 50);
            $table->text('description', 240);
            $table->date('date_entrance');
            $table->date('last_update');
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
        Schema::dropIfExists('moneySource');
    }
}
