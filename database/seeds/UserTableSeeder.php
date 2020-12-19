<?php

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
		DB::table('users')->insert([
			'login' => 'MasterAdmin',
			'email' => 'my_email@server.com',
			'password' => bcrypt('passw'),
			'created_at' => now()
		]);

	}

}
