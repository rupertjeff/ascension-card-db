<?php
/**
 * Name: Expansion.php
 * Description:
 * Version: 0.0.1
 * Author: jeffr
 * Created: 2015-11-01
 * Last Modified: 2015-11-01
 */
namespace App\Transformer;

use App\Database\Model\Expansion as ExpansionModel;
use League\Fractal\TransformerAbstract;

class Expansion extends TransformerAbstract
{
    public function transform(ExpansionModel $expansion)
    {
        return [
            'id' => $expansion->uuid,
            'name' => $expansion->name,
            'abbreviation' => $expansion->abbreviation,
        ];
    }
}
