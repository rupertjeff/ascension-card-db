<?php
/**
 * Name: Model.php
 * Description:
 * Version: 0.0.1
 * Author: jeffr
 * Created: 2015-10-14
 * Last Modified: 2015-10-14
 */

namespace App\Database;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Ramsey\Uuid\Uuid;

/**
 * Class Model
 *
 * @package App\Database
 *
 * @property string $uuid
 */
class Model extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = ['uuid'];

    /**
     * Override to ensure uuid is set, so everything can be referenced from that
     * parameter, rather than from an integer parameter.
     *
     * @param array $attributes
     *
     * @return $this
     */
    public function fill(array $attributes)
    {
        if (empty($attributes['uuid'])) {
            $attributes['uuid'] = Uuid::uuid4()->toString();
        }

        return parent::fill($attributes);
    }
}
