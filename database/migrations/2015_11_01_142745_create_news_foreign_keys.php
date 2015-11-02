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
		    
		    $table->unique(['author_id', 'category_id'], 'unique_pair');
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
		    $table->dropForeign('category_id');
		    $table->dropForeign('author_id');
	    });
    }
}
