<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CarTableSeeder::class);
        $this->call(PhotoTableSeeder::class);
        $this->call(MessageTableSeeder::class);
        // $this->call(settingsTableSeeder::class);
        DB::unprepared(\File::get(base_path('database/seeds/settings.sql')));
    }
}
