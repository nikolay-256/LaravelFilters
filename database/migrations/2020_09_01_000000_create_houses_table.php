<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('houses', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->double('price')->unsigned();
			$table->smallInteger('bedrooms')->unsigned()->index();
			$table->smallInteger('bathrooms')->unsigned()->index();
			$table->smallInteger('storeys')->unsigned()->index();
			$table->smallInteger('garages')->unsigned()->index();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
