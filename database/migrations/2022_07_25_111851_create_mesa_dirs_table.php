<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMesaDirsTable.
 */
class CreateMesaDirsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mesa_dirs', function(Blueprint $table) {
            $table->id();
            $table->string('chave');
            $table->string('setor');
            $table->string('cargo');
            $table->string('titular');
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->text('tag');
            $table->bigInteger('predio_id')->unsigned()->nullable();
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
		Schema::drop('mesa_dirs');
	}
}
