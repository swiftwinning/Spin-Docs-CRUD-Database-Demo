<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectShopsAndReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {

        $table->integer('shop_id')->unsigned();

		# This field `author_id` is a foreign key that connects to the `id` field in the `authors` table
        $table->foreign('shop_id')->references('id')->on('shops');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {

        # ref: http://laravel.com/docs/migrations#dropping-indexes
        # combine tablename + fk field name + the word "foreign"
        $table->dropForeign('reviews_shop_id_foreign');

        $table->dropColumn('shop_id');
    });
    }
}
