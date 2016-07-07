<?php namespace Database\Tester\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreatePostsTable extends Migration
{
	
	public function up()
	{
		Schema::create('database_tester_posts', function ($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('title')->nullable();
			$table->string('slug')->nullable()->index();
			$table->text('long_slug')->nullable();
			$table->text('description')->nullable();
			$table->boolean('is_published')->default(false);
			$table->timestamp('published_at')->nullable();
			$table->integer('author_id')->unsigned()->index()->nullable();
			$table->string('author_nickname')->default('October')->nullable();
			$table->softDeletes();
			$table->timestamps();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('database_tester_posts');
	}
	
}
