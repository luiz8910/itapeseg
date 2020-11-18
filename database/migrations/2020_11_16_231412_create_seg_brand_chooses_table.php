<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSegBrandChoosesTable.
 */
class CreateSegBrandChoosesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seg_brand_chooses', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('segment_id');
            $table->integer('brand_id');
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
		Schema::drop('seg_brand_chooses');
	}
}
