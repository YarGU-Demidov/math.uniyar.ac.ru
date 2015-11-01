<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create("news_keywords",function(Blueprint $table)
	    {
		    $table->integer('news_id')->unsigned();
		    $table->integer('keyword_id')->unsigned();

		    //INDEXES
		    $table->index(['news_id', 'keyword_id']);
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::drop("news_keywords");
    }
}
