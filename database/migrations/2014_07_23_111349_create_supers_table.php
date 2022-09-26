<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSupersTable.
 */
class CreateSupersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supers', function(Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('localiz');
            $table->string('tel');
            $table->string('email')->nullable();
            $table->string('url')->nullable();
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
		Schema::drop('supers');
	}
}
