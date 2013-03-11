<?php

use Illuminate\Database\Migrations\Migration;

class CreateNews extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->string('url')->unique();
		    $table->integer('points')->unsigned()->default(0);
		    $table->integer('user_id');
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
		Schema::drop('news');
	}

}