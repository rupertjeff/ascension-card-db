<?php

namespace App\Database\Model;

use App\Database\Model;

/**
 * Class Card
 *
 * @package App\Database\Model
 *
 * @property int            $id
 * @property int            $expansion_id
 * @property int            $faction_id
 * @property string         $type
 * @property string         $name
 * @property string         $effect
 * @property string         $quote
 * @property int            $honor
 * @property int            $cost
 * @property int            quantity
 *
 * @property-read Expansion $expansion
 * @property-read Faction   $faction
 */
class Card extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function expansion()
    {
        return $this->belongsTo(Expansion::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faction()
    {
        return $this->belongsTo(Faction::class);
    }
}
