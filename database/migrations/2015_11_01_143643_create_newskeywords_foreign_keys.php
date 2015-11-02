<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewskeywordsForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table("news_keywords",function(Blueprint $table)
	    {
		    $table->foreign('news_id')
			    ->references('id')->on('news')
			    ->onDelete("CASCADE");
		    $table->foreign('keyword_id')
			    ->references('id')->on('keywords')
			    ->onDelete("CASCADE");

		    $table->unique(['news_id', 'keyword_id'], 'unique_pair');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table("news_keywords",function(Blueprint $table)
	    {
		    $table->dropForeign('news_keywords_keyword_id_foreign');
		    $table->dropForeign('news_keywords_news_id_foreign');
	    });
    }
}