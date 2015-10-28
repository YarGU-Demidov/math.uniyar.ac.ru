<?php

	use App\Models\User;

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

			$default = [
				'username' => 'admin',
				'password' => 'test',
				'name' => 'SleepingOwl',
				'surname' => 'Administrator',
			];

			try
			{
				User::create($default);
			}
			catch(\Exception $e)
			{
				exit($e->getMessage());
			}

			Model::reguard();
		}
	}
