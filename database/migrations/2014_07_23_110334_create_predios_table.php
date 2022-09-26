<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePrediosTable.
 */
class CreatePrediosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('predios', function(Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('alba_id');
            $table->foreign('alba_id')->references('id')->on('albas');
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
		Schema::drop('predios');
	}
}
