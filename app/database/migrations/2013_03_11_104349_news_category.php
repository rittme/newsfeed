<?php

use Illuminate\Database\Migrations\Migration;

class NewsCategory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('news', function($table)
		{
		    $table->string('category');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('news', function($table)
		{
		    $table->dropColumn('category');
		});
	}

}