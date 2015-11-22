<?php

use App\Database\Model\Faction;
use Illuminate\Database\Seeder;

class FactionSeeder extends Seeder
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
                'name' => 'No Faction',
            ],
            [
                'name' => 'Enlightened',
            ],
            [
                'name' => 'Lifebound',
            ],
            [
                'name' => 'Mechana',
            ],
            [
                'name' => 'Void',
            ],
        ];

        foreach ($data as $item) {
            Faction::create($item);
        }
    }
}
