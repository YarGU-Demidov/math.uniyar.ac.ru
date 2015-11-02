<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table("news",function(Blueprint $table)
	    {
		    $table->foreign('author_id')
			    ->references('id')->on('users')
			    ->onDelete("CASCADE");
		    $table->foreign('category_id')
			    ->references('id')->on('categories')
			    ->onDelete("CASCADE");
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table("news",function(Blueprint $table)
	    {
		    $table->dropForeign('news_category_id_foreign');
		    $table->dropForeign('news_author_id_foreign');
	    });
    }
}
