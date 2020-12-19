<?php

use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_GB');


        for ($i = 1; $i <= 30; $i++) {

            DB::table('messages')->insert([
                'name' => $faker->name,
                'email' => $faker->freeEmail,
                'telephone' => $faker->phoneNumber,
                'content' => $faker->sentence(150),
                'isnew' => $faker->boolean,
                'created_at' => $faker->dateTime


            ]);
        }

    }
}
