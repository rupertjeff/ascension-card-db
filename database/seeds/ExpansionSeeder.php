<?php

use App\Database\Model\Expansion;
use Illuminate\Database\Seeder;

class ExpansionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Chronicle of the Godslayer',
                'abbreviation' => 'CotG',
            ],
            [
                'name' => 'Revenge of the Fallen',
                'abbreviation' => 'RotF',
            ],
            [
                'name' => 'Storm of Souls',
                'abbreviation' => 'SoS',
            ],
            [
                'name' => 'Immortal Heroes',
                'abbreviation' => 'IH',
            ],
            [
                'name' => 'Rise of Vigil',
                'abbreviation' => 'RoV',
            ],
            [
                'name' => 'Darkness Unleashed',
                'abbreviation' => 'DU',
            ],
            [
                'name' => 'Realms Unraveled',
                'abbreviation' => 'RU',
            ],
            [
                'name' => 'Dawn of Champions',
                'abbreviation' => 'DoC',
            ],
        ];

        foreach ($data as $item) {
            Expansion::create($item);
        }
    }
}
