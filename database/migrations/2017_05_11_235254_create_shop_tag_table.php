<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTagTable extends Migration
{
    public function up()
	{
		Schema::create('shop_tag', function (Blueprint $table) {

			$table->increments('id');
			$table->timestamps();

			$table->integer('shop_id')->unsigned();
			$table->integer('tag_id')->unsigned();

			$table->foreign('shop_id')->references('id')->on('shops');
			$table->foreign('tag_id')->references('id')->on('tags');
		});
	}

	public function down()
	{
		Schema::drop('shop_tag');
	}
}
