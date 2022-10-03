<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAlasTable.
 */
class CreateAlasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alas', function(Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('predio_id');
            $table->foreign('predio_id')->references('id')->on('predios');
            $table->softDeletes();
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
		Schema::drop('alas');
	}
}
