<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            'Swiatla Led'

        ];
        for ($l = 1; $l <= 5; $l++) {
            for ($i = 1; $i <= 100; $i++) {

                $randOp = rand(0, count($options) - 1);
                DB::table('options')->insert([
                    'car_id' => $i,
                    'option' => $options[$randOp]


                ]);
            }
        }
    }

}
