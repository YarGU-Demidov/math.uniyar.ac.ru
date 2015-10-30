<?php

	use Illuminate\Database\Seeder;
	use Illuminate\Database\Eloquent\Model;

	class DatabaseSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			Model::unguard();

			$this->call(DegreeTableSeeder::class);
			$this->command->info('Degrees added to database!');

			$this->call(UserTableSeeder::class);
			$this->command->info('Users added to database!');

			Model::reguard();
		}
	}
