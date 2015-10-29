<?php

	use App\Models\User;
	use Illuminate\Database\Seeder;

	class UserTableSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{

			$this->setAdmin();
		}

		private function setAdmin()
		{
			$default = [
				'username'  => 'admin',
				'password'  => 'test',
				'name'      => 'Math',
				'surname'   => 'Faculty',
				'middlename'=> 'Administrator'
			];

			$this->create($default);
		}

		private function create(array $data)
		{
			try
			{
				User::create($data);
			}
			catch(\Exception $e)
			{
				exit($e->getMessage());
			}
		}
	}
