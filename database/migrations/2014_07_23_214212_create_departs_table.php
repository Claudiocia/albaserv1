<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateDepartsTable.
 */
class CreateDepartsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('departs', function(Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('localiz');
            $table->string('tel');
            $table->string('email')->nullable();
            $table->string('url')->nullable();
            $table->unsignedBigInteger('super_id');
            $table->foreign('super_id')->references('id')->on('supers');
            $table->unsignedBigInteger('predio_id');
            $table->foreign('predio_id')->references('id')->on('predios');
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
		Schema::drop('departs');
	}
}
