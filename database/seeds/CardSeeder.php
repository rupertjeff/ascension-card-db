<?php

use App\Database\Model\Card;
use Illuminate\Database\Seeder;

abstract class CardSeeder extends Seeder
{
    const CARD_TYPE_HERO = 'hero';
    const CARD_TYPE_CONSTRUCT = 'construct';
    const CARD_TYPE_MONSTER = 'monster';

    const EXPANSION_COTG = 1;

    const FACTION_NONE = 1;
    const FACTION_ENLIGHTENED = 2;
    const FACTION_LIFEBOUND = 3;
    const FACTION_MECHANA = 4;
    const FACTION_VOID = 5;

    const FACTION_ENLIGHTENED_LIFEBOUND = 23;
    const FACTION_ENLIGHTENED_MECHANA = 24;
    const FACTION_ENLIGHTENED_VOID = 25;
    const FACTION_LIFEBOUND_MECHANA = 34;
    const FACTION_LIFEBOUND_VOID = 35;
    const FACTION_MECHANA_VOID = 45;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cards = $this->getCards();

        foreach ($cards as $card) {
            Card::create($card);
        }
    }

    abstract protected function getCards();
}
