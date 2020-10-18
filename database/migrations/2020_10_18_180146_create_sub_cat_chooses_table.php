<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSubCatChoosesTable.
 */
class CreateSubCatChoosesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sub_cat_chooses', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('sub_id');
            $table->integer('product_id');
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
		Schema::drop('sub_cat_chooses');
	}
}
