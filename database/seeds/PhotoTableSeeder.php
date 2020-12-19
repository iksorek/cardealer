<?php

use Illuminate\Database\Seeder;

class PhotoTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker\Factory::create('pl_PL');

		for ($i = 1; $i <= 1000; $i++) {
			$path = 'https://loremflickr.com/800/600/car/?lock=' . $i;
			if ($i <= 100) {
				$carid = $i;
				$ismain = 1;
			} else {
				$carid = rand(1, 100);
				$ismain = 0;
			}
			DB::table('photos')->insert([

				'car_id' => $carid,
				'is_main' => $ismain,
				'path' => $path,
				'created_at' => now()
			]);
		}

	}
}
