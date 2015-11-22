<?php

namespace App\Database\Model;

use App\Database\Model;

/**
 * Class Expansion
 *
 * @package App\Database\Model
 *
 * @property int                                           $id
 * @property string                                        $name
 * @property string                                        $abbreviation
 * @property-read \Illuminate\Database\Eloquent\Collection $cards
 */
class Expansion extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
