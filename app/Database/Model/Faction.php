<?php

namespace App\Database\Model;

use App\Database\Model;

/**
 * Class Faction
 *
 * @package App\Database\Model
 *
 * @property-read \Illuminate\Database\Eloquent\Collection $cards
 */
class Faction extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
