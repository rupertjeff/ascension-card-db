<?php
/**
 * Name: Card.php
 * Description:
 * Version: 0.0.1
 * Author: jeffr
 * Created: 2015-11-01
 * Last Modified: 2015-11-01
 */
namespace App\Transformer;

use App\Database\Model\Card as CardModel;
use League\Fractal\TransformerAbstract;

/**
 * Class Card
 *
 * @package App\Transformer
 */
class Card extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $availableIncludes = [
        'expansion',
    ];

    /**
     * @var array
     */
    protected $defaultIncludes = [
        'faction',
    ];

    /**
     * @param CardModel $card
     *
     * @return array
     */
    public function transform(CardModel $card)
    {
        return [
            'id' => $card->uuid,
            'type' => $card->type,
            'name' => $card->name,
            'effect' => $card->effect,
            'quote' => $card->quote,
            'honor' => (int)$card->honor,
            'cost' => (int)$card->cost,
            'quantity' => (int)$card->quantity,
        ];
    }

    /**
     * @param CardModel $card
     *
     * @return \League\Fractal\Resource\Item
     */
    public function includeExpansion(CardModel $card)
    {
        return $this->item($card->expansion, new Expansion, 'expansion');
    }

    /**
     * @param CardModel $card
     *
     * @return \League\Fractal\Resource\Item
     */
    public function includeFaction(CardModel $card)
    {
        return $this->item($card->faction, new Faction, 'faction');
    }
}
