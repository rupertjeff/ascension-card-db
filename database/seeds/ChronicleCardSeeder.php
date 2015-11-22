<?php

class ChronicleCardSeeder extends CardSeeder
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected function getCards()
    {
        $baseCards        = $this->getBaseCards();
        $enlightenedCards = $this->getEnlightenedCards();
        $lifeboundCards   = $this->getLifeboundCards();
        $mechanaCards     = $this->getMechanaCards();
        $voidCards        = $this->getVoidCards();
        $monsterCards     = $this->getMonsterCards();

        $allCards = $baseCards
            ->merge($enlightenedCards)
            ->merge($lifeboundCards)
            ->merge($mechanaCards)
            ->merge($voidCards)
            ->merge($monsterCards)
            ->map(function ($value) {
                return array_merge($value, [
                    'expansion_id' => self::EXPANSION_COTG,
                ]);
            });

        return $allCards;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    protected function getBaseCards()
    {
        return collect([
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Apprentice',
                'effect'   => '+1 rune',
                'quantity' => 0,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Militia',
                'effect'   => '+1 power',
                'quantity' => 0,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Mystic',
                'effect'   => '+2 runes',
                'quantity' => 0,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Heavy Infantry',
                'effect'   => '+2 power',
                'quantity' => 0,
            ],
            [
                'type'     => self::CARD_TYPE_MONSTER,
                'name'     => 'Cultist',
                'effect'   => '+1 honor',
                'quantity' => 0,
            ],
        ])->map(function ($value) {
            return array_merge($value, [
                'faction_id' => self::FACTION_NONE,
            ]);
        });
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    protected function getEnlightenedCards()
    {
        return collect([
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Arha Initiate',
                'effect'   => 'Draw a card.',
                'quote'    => 'Nellin observed the whirling movements of the Initiates. “Are they practicing forms?” he asked. “No,” came the instructor’s reply. “They are meditating.”',
                'honor'    => 1,
                'cost'     => 1,
                'quantity' => 3,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Arha Templar',
                'effect'   => 'Defeat a Monster that has 4 power or less without paying its cost.',
                'quote'    => 'Sharpen the mind, and the sword will follow.',
                'honor'    => 3,
                'cost'     => 4,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Ascetic of the Lidless Eye',
                'effect'   => 'Draw two cards.',
                'quote'    => '“There is nothing obscure about what is to come, Godslayer; the future is always clear to those who choose to see. It is your judgment that is clouded.”',
                'honor'    => 2,
                'cost'     => 5,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Master Dhartha',
                'effect'   => 'Draw three cards.',
                'quote'    => 'At the height of the war, the Godslayer ascended six-thousand, six-hundred sixty-six steps to seek Dharta’s counsel, only to be turned away.',
                'honor'    => 3,
                'cost'     => 7,
                'quantity' => 1,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Oziah the Peerless',
                'effect'   => 'Defeat a Monster that has 6 power or less without paying its cost.',
                'quote'    => '“Child, this new world must have nroth and south, east and west,” Logos said. Oziah drew his sword and cut twice. “Father, it is done,” he replied.',
                'honor'    => 3,
                'cost'     => 6,
                'quantity' => 1,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Seer of the Forked Path',
                'effect'   => 'Draw a card. You may banish a card in the center row.',
                'quote'    => '“The left path holds death for you, Godslayer. The right path, death for her. You must choose quickly - Samael is on the move.”',
                'honor'    => 1,
                'cost'     => 2,
                'quantity' => 3,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Temple Librarian',
                'effect'   => 'Discard a card. If you do, draw two cards.',
                'quote'    => '“Without knowledge, power is illusory. Without order, knowledge is fragmented. Without me, order is impossible.”',
                'honor'    => 1,
                'cost'     => 2,
                'quantity' => 3,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Twofold Askara',
                'effect'   => 'Copy the effect of a Hero played this turn.',
                'quote'    => 'Samael had ensorcelled the catacomb gate to take the life of the disenchanter that broke it. Only the beloved of the Godslayer had that knack. Unbidden, the Askara acted in her stead.',
                'honor'    => 2,
                'cost'     => 4,
                'quantity' => 1,
            ],
            [
                'type'     => self::CARD_TYPE_CONSTRUCT,
                'name'     => 'The All-Seeing Eye',
                'effect'   => 'Once per turn, you may draw a card.',
                'quote'    => 'In Arha, knowledge is an unparalleled good. All are judged not by their deeds, but their ideas.',
                'honor'    => 2,
                'cost'     => 6,
                'quantity' => 1,
            ],
            [
                'type'     => self::CARD_TYPE_CONSTRUCT,
                'name'     => 'Tablet of Time’s Dawn',
                'effect'   => 'You may banish this Construct to take an additional turn after this one.',
                'quote'    => 'Foremost of Logos’ sons was Time: a cheater, a scoundrel, destined to lord over all in the end.',
                'honor'    => 2,
                'cost'     => 5,
                'quantity' => 1,
            ],
        ])->map(function ($value) {
            return array_merge($value, [
                'faction_id' => self::FACTION_ENLIGHTENED,
            ]);
        });
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    protected function getLifeboundCards()
    {
        return collect([
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Cetra, Weaver of Stars',
                'effect'   => 'Acquire a Hero without paying its cost. Place it on top of your deck.',
                'quote'    => '“Your destiny is in the stars, and if the Mother finds you worth, I will lay it at your feet.”',
                'honor'    => 4,
                'cost'     => 7,
                'quantity' => 1,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Druids of the Stone Circle',
                'effect'   => 'Acquire a Hero with cost 3 honor or less without paying its cost. Place it on top of your deck.',
                'quote'    => 'For countless centuries in Ogo the order of the Stone Circle worked to deepen their connection to all living things.',
                'honor'    => 3,
                'cost'     => 4,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Flytrap Witch',
                'effect'   => 'Gain 2 honor. Draw a card.',
                'quote'    => 'She was guide to both would-be leaders, but only the Godslayer reached the other side of the swamp. His rival simply vanished.',
                'honor'    => 2,
                'cost'     => 5,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Landtalker',
                'effect'   => 'Gain 3 runes.',
                'quote'    => '“This land is a prisoner, Godslayer. You tear out its hair from the ground, rip out its innards from the mountains, drink its blood from the seas. Come to Ogo, and experience the joy of free earth.”',
                'honor'    => 3,
                'cost'     => 6,
                'quantity' => 1,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Lifebound Initiate',
                'effect'   => 'Gain 1 rune and 1 honor.',
                'quote'    => 'There is but one true Mother, and all the Lifebound are her children.',
                'honor'    => 1,
                'cost'     => 1,
                'quantity' => 3,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Runic Lycanthrope',
                'effect'   => 'Gain 2 runes. If you have played another Lifebound Hero this turn, gain 2 power.',
                'quote'    => '“Senses. Speed. Reflexes. Cunning. Only a fool would call this a curse.”',
                'honor'    => 1,
                'cost'     => 3,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Wolf Shaman',
                'effect'   => 'Gain 1 rune. Draw a card.',
                'quote'    => 'Each evening, the newcomer would climb the parapet and howl mournfully at the moon. On the third night, the moon howled back.',
                'honor'    => 1,
                'cost'     => 3,
                'quantity' => 3,
            ],
            [
                'type'     => self::CARD_TYPE_CONSTRUCT,
                'name'     => 'Snapdragon',
                'effect'   => 'Once per turn, gain 1 rune. The first time you play a Lifebound Hero each turn, gain 1 honor.',
                'quote'    => 'There is no deadlier poison than pride.',
                'honor'    => 2,
                'cost'     => 5,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_CONSTRUCT,
                'name'     => 'Yggdrasil Staff',
                'effect'   => 'Once per turn, gain 1 power. Once per turn, you may spend 4 runes to gain 3 honor.',
                'quote'    => 'As it grows, so grows the legend of its wielder.',
                'honor'    => 2,
                'cost'     => 4,
                'quantity' => 2,
            ],
        ])->map(function ($value) {
            return array_merge($value, [
                'faction_id' => self::FACTION_LIFEBOUND,
            ]);
        });
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    protected function getMechanaCards()
    {
        return collect([
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Avatar Golem',
                'effect'   => 'Gain 2 power. Gain 1 honor for each faction among constructs you control. (Factions are Enlightened, Mechana, Lifebound, and Void.)',
                'quote'    => '',
                'honor'    => 2,
                'cost'     => 4,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Kor, the Ferromancer',
                'effect'   => 'Gain 2 power. Draw a card if you control 2 or more Constructs.',
                'quote'    => 'Warning: Junkyard may be hazardous. Proceed with caution.',
                'honor'    => 2,
                'cost'     => 3,
                'quantity' => 1,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Mechana Initiate',
                'effect'   => 'Gain 1 rune or 1 power.',
                'quote'    => 'Initially encountered slight resistance to acclimation process. Enhanced shell’s electrofeedback, unit now functioning as intended.',
                'honor'    => 1,
                'cost'     => 1,
                'quantity' => 3,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Reactor Monk',
                'effect'   => 'Gain 2 runes. You pay 1 rune less the next time you acquire a Construct this turn.',
                'quote'    => 'Core power output up 20%. Monk mortality rate up 20%.',
                'honor'    => 2,
                'cost'     => 4,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_CONSTRUCT,
                'name'     => 'Burrower Mark II',
                'effect'   => 'Once per turn, when you put a Mechana Construct into play (including this one), draw a card.',
                'quote'    => 'Can you dig it?',
                'honor'    => 3,
                'cost'     => 3,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_CONSTRUCT,
                'name'     => 'The Grand Design',
                'effect'   => 'Once per turn, gain 2 runes. You may spend it only to acquire Mechana Constructs.',
                'quote'    => 'Divine schematic said to detail the primary function. Contains a place for all Mechana.',
                'honor'    => 6,
                'cost'     => 6,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_CONSTRUCT,
                'name'     => 'Hedron Cannon',
                'effect'   => 'Once per turn, gain 1 power for each Mechana Construct you control.',
                'quote'    => 'Attention Godslayer: Conventional war against Fallen One a waste of time and resources. New plan: destroy with dimensional cannon as shown.',
                'honor'    => 8,
                'cost'     => 8,
                'quantity' => 1,
            ],
            [
                'type'     => self::CARD_TYPE_CONSTRUCT,
                'name'     => 'Hedron Link Device',
                'effect'   => 'You may treat all Constructs as Mechana Constructs.',
                'quote'    => 'Situation: Great Seal breached. Scattered devices from across all realms are reconnecting. Miracle or tragedy? Please advise.',
                'honor'    => 7,
                'cost'     => 7,
                'quantity' => 1,
            ],
            [
                'type'     => self::CARD_TYPE_CONSTRUCT,
                'name'     => 'Rocket Courier X-99',
                'effect'   => 'Once pur turn, when you acquire a Mechana Constrcut, you may put it directly into play.',
                'quote'    => 'Enhancements over X-90 model: 1. Increased speed 2. [Beta] - Steering',
                'honor'    => 4,
                'cost'     => 4,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_CONSTRUCT,
                'name'     => 'Watchmaker’s Altar',
                'effect'   => 'Once per turn, gain 1 rune. You may spend it only to acquire Mechana Constructs.',
                'quote'    => 'Penalty for infringement: 1. Termination 2. Conversion to organic scrap.',
                'honor'    => 5,
                'cost'     => 5,
                'quantity' => 2,
            ],
        ])->map(function ($value) {
            return array_merge($value, [
                'faction_id' => self::FACTION_MECHANA,
            ]);
        });
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    protected function getVoidCards()
    {
        return collect([
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Arbiter of the Precipice',
                'effect'   => 'Draw 2 cards. Banish a card in your hand.',
                'quote'    => '“Memory and history are no concern of mine. This foul thing should never have existed. Now, it will be as if it never did.”',
                'honor'    => 1,
                'cost'     => 4,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Demon Slayer',
                'effect'   => 'Gain 3 power.',
                'quote'    => '“How many demons have you slain, stranger?” Sar asked, lowering his massive sword. “One so far,” Nellin replied, and grinned. “But it was a really, really big one.”',
                'honor'    => 2,
                'cost'     => 4,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Emri, One with the Void',
                'effect'   => 'Gain 4 power.',
                'quote'    => 'Emri paused above the noble as her blade hovered. “When you have conquered everything, Xeron,” she said, “there is still Nothing to fear.”',
                'honor'    => 3,
                'cost'     => 6,
                'quantity' => 1,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Shade of the Black Watch',
                'effect'   => 'Gain 2 power. You may banish a card in your hand or discard pile.',
                'quote'    => 'The offspring of Samael and Nyx emerge from the Void regularly, and must be banished.',
                'honor'    => 1,
                'cost'     => 3,
                'quantity' => 3,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Spike Vixen',
                'effect'   => 'Gain 1 power. Draw a card.',
                'quote'    => 'Though Dread Liza has departed the Obsidian Ring, many of her deadly students remain.',
                'honor'    => 1,
                'cost'     => 2,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_HERO,
                'name'     => 'Void Initiate',
                'effect'   => 'Gain 1 rune. You may banish a card in your hand or discard pile.',
                'quote'    => 'Those who are still sane after the initiation rites are allowed to become watchers or arbiters.',
                'honor'    => 1,
                'cost'     => 1,
                'quantity' => 3,
            ],
            [
                'type'     => self::CARD_TYPE_CONSTRUCT,
                'name'     => 'Muramasa',
                'effect'   => 'Once per turn, gain 3 power.',
                'quote'    => 'Wield the devil, and hell will tremble before you.',
                'honor'    => 4,
                'cost'     => 7,
                'quantity' => 1,
            ],
            [
                'type'     => self::CARD_TYPE_CONSTRUCT,
                'name'     => 'Shadow Star',
                'effect'   => 'Once per turn, gain 1 power.',
                'quote'    => '“Just be careful when you throw it, Godslayer,” the weaponmaster said with a frown. “It will not suffer a wielder with poor aim.”',
                'honor'    => 2,
                'cost'     => 3,
                'quantity' => 2,
            ],
            [
                'type'     => self::CARD_TYPE_CONSTRUCT,
                'name'     => 'Voidthirster',
                'effect'   => 'Once per turn, gain 1 power. The first time you defeat a Monster in the center row each turn, gain 1 honor.',
                'quote'    => '',
                'honor'    => 3,
                'cost'     => 5,
                'quantity' => 2,
            ],
        ])->map(function ($value) {
            return array_merge($value, [
                'faction_id' => self::FACTION_VOID,
            ]);
        });
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    protected function getMonsterCards()
    {
        return collect([
            [
                'name'     => 'Avatar of the Fallen',
                'effect'   => 'Unbanishable. Gain 4 honor. You may acquire or defeat any card in the center row without paying its cost.',
                'honor'    => 4,
                'cost'     => 7,
                'quantity' => 1,
            ],
            [
                'name'     => 'Corrosive Widow',
                'effect'   => 'Gain 3 honor. Each opponent must destroy a Construct he/she controls.',
                'honor'    => 3,
                'cost'     => 4,
                'quantity' => 4,
            ],
            [
                'name'     => 'Earth Tyrant',
                'effect'   => 'Gain 5 honor. Draw two cards.',
                'honor'    => 5,
                'cost'     => 6,
                'quantity' => 2,
            ],
            [
                'name'     => 'Mephit',
                'effect'   => 'Gain 2 honor. You may banish a card in the center row.',
                'honor'    => 2,
                'cost'     => 3,
                'quantity' => 3,
            ],
            [
                'name'     => 'Mistake of Creation',
                'effect'   => 'Gain 4 honor. You may banish a card in the center row and/or a card in your discard pile.',
                'honor'    => 4,
                'cost'     => 4,
                'quantity' => 4,
            ],
            [
                'name'     => 'Samael’s Trickster',
                'effect'   => 'Gain 1 honor and 1 rune.',
                'honor'    => 1,
                'cost'     => 3,
                'quantity' => 4,
            ],
            [
                'name'     => 'Sea Tyrant',
                'effect'   => 'Gain 5 honor. If an opponent has more than one Construct, that player must destroy all but one Construct he/she controls.',
                'honor'    => 5,
                'cost'     => 5,
                'quantity' => 3,
            ],
            [
                'name'     => 'Tormented Soul',
                'effect'   => 'Gain 1 honor. Draw a card.',
                'honor'    => 1,
                'cost'     => 3,
                'quantity' => 3,
            ],
            [
                'name'     => 'Wind Tyrant',
                'effect'   => 'Gain 3 honor and 3 runes.',
                'honor'    => 3,
                'cost'     => 5,
                'quantity' => 3,
            ],
            [
                'name'     => 'Xeron, Duke of Lies',
                'effect'   => 'Gain 3 honor. Take a card at random from each opponent’s hand and add that card to your hand.',
                'honor'    => 3,
                'cost'     => 6,
                'quantity' => 1,
            ],
        ])->map(function ($value) {
            return array_merge($value, [
                'faction_id' => self::FACTION_NONE,
                'type'       => self::CARD_TYPE_MONSTER,
            ]);
        });
    }
}
