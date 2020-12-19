<?php

use Illuminate\Database\Seeder;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_GB');
        $makes = ['Opel', 'Fiat', 'Mazda', 'Bmw', 'Audi', 'Porshe', 'Aston Martin', 'Citroen', 'Volvo'];
        $models = [6, 'astra', 'passat', '125p', 'boxter', 'xara picasso'];
        $fuels = ['Petrol', 'Petrol/LPG', 'Diesel', 'Hybrid'];
        $engines = ['1.0', '1.4', '1.5', '1.7', '1.9', '2.0', '2.2', '3.0'];
        $gearboxes = ['Automatic', 'Manual'];
        $status = ['Available', 'Reseved', 'Sold'];
        $options = [
            'Alufelgi',
            'radio mp3',
            'bluetooth',
            'naglosnienie premium',
            'przyciemnione szyby',
            'ISOFIX',
            'zapasowe kolo',
            'ABS',
            'ASR',
            'Czujnik deszu',
            'Klimatyzacja',
            'System START/ STOP',
            'Kamera cofania',
            'Elektryczne szyby',
            'Podgrzewane siedzenia',
            'Tempomat',
            'Swiatla Led',
            'Popielniczka',
            'Autopilot',
            'szofer'

        ];


        for ($i = 1; $i <= 100; $i++) {
            $random = [];
            $randomString = '';
            for ($ro = 1; $ro <= 10; $ro++) {

                $add = $options[rand(0, count($options) - 1)];
                if (!in_array($add, $random)) {
                    $random[] = $add;
                    $randomString .= strtoupper($add) . ',';
                }
            }
            DB::table('cars')->insert([
                'user_id' => 1,
                'type' => 'Sedan',
                'make' => $makes[rand(0, count($makes) - 1)],
                'model' => $models[rand(0, count($models) - 1)],
                'fuel' => $fuels[rand(0, count($fuels) - 1)],
                'engine' => $engines[rand(0, count($engines) - 1)],
                'color' => $faker->colorName,
                'year' => rand(1992, 2020),
                'gearbox' => $gearboxes[rand(0, count($gearboxes) - 1)],
                'mileage' => rand(1230, 291252),
                'price' => rand(3000, 30000),
                'extras' => $randomString,
                'description' => $faker->text(1000),
                'status' => $status[rand(0, 2)],
                'created_at' => $faker->dateTime


            ]);
        }


    }
}
