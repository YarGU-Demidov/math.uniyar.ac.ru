<?php

	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class CreateUsersTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('users', function (Blueprint $table) {
				$table->increments('id');
				$table->string('username');
				$table->string('email')->nullable();

				$table->string('password', 60);

				$table->string('name');
				$table->string('surname');
				$table->string('middlename')->nullable();


				$table->integer('groupId');

				$table->string('image')->default("/images/tempProfilePicture.jpg");

				$table->rememberToken();
				$table->timestamps();


				//================================================
				//==================INDEXES=======================
				//================================================

				$table->unique(['username', 'email']);

			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::drop('users');
		}
	}
