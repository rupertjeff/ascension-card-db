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

use App\Database\Model\Card;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Ramsey\Uuid\Uuid;

/**
 * Class Model
 *
 * @package App\Database
 *
 * @property string $uuid
 *
 * @method static \Illuminate\Pagination\LengthAwarePaginator paginate($perPage = null, $columns = ['*'], $pageName = 'name', $page = null)
 */
class Model extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = ['uuid'];

    /**
     * @param string $uuid
     *
     * @return Card
     */
    public static function byUuid($uuid)
    {
        $instance = new static;
        $query    = $instance->newQuery();

        return $query
            ->where('uuid', $uuid)
            ->firstOrFail();
    }

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
