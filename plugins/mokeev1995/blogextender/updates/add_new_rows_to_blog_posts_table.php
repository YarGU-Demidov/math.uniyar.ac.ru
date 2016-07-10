<?php namespace Mokeev1995\Blogextender\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class AddNewRowsToBlogPostsTable extends Migration
{
	
	public function up()
	{
		Schema::table('rainlab_blog_posts', function (Blueprint $table)
		{
			$table->boolean("front_page_visible");
		});
	}
	
	public function down()
	{
		Schema::table('users', function (Blueprint $table){
			$table->dropDown([
				"front_page_visible"
			]);
		});
	}
	
}
