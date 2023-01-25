<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAndarsTable.
 */
class CreateAndarsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('andars', function(Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->bigInteger('ala_id')->unsigned();
            $table->foreign('ala_id')->references('id')->on('alas');
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
		Schema::drop('andars');
	}
}
