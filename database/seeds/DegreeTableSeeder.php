<?php

	use App\Models\Degree;
	use Illuminate\Database\Seeder;

	class DegreeTableSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			$degrees =
				[
					"Аспирант",
					"Кандидат наук",
					"Доктор наук",
					"Доцент",
					"Приглашенный профессор",
					"Профессор",
				];

			foreach ($degrees as $degree)
			{
				$this->create($degree);
			}

		}

		private function create($data)
		{
			try
			{
				Degree::create(['name' => $data]);
			}
			catch(\Exception $e)
			{
				exit($e->getMessage());
			}
		}
	}
