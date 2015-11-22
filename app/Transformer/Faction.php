<?php
/**
 * Name: Faction.php
 * Description:
 * Version: 0.0.1
 * Author: jeffr
 * Created: 2015-11-01
 * Last Modified: 2015-11-01
 */
namespace App\Transformer;

use App\Database\Model\Faction as FactionModel;
use League\Fractal\TransformerAbstract;

/**
 * Class Faction
 *
 * @package App\Transformer
 */
class Faction extends TransformerAbstract
{
    /**
     * @param FactionModel $faction
     *
     * @return array
     */
    public function transform(FactionModel $faction)
    {
        return [
            'id' => $faction->uuid,
            'name' => $faction->name,
        ];
    }
}
