<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create("keywords",function(Blueprint $table)
	    {
		    $table->increments('id');
		    $table->string('word');

		    $table->timestamps();

		    //INDEXES
		    $table->unique("word");
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::drop("keywords");
    }
}
