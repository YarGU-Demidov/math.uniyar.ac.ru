<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create("news",function(Blueprint $table)
	    {
		    $table->increments('id');
		    $table->string('title');
		    $table->integer('author_id')->unsigned();
		    $table->string('image');
		    $table->string('announce');
		    $table->text('text');
		    $table->integer('category_id')->unsigned();

		    $table->string('short_url');

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
	    Schema::drop("news");
    }
}
