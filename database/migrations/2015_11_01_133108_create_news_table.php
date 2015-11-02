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
		    $table->string('image')->nullable();
		    $table->text('announce');
		    $table->text('text');
		    $table->integer('category_id')->unsigned();

		    $table->string('short_url')->nullable();

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
