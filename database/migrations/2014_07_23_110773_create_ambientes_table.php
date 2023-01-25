<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAmbientesTable.
 */
class CreateAmbientesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ambientes', function(Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('num')->nullable();
            $table->string('tipo');
            $table->bigInteger('andar_id')->unsigned();
            $table->foreign('andar_id')->references('id')->on('andars');
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
		Schema::drop('ambientes');
	}
}
