<?php
/**
 * Name: ExpansionController.php
 * Description:
 * Version: 0.0.1
 * Author: jeffr
 * Created: 2015-11-21
 * Last Modified: 2015-11-21
 */
namespace App\Http\Controllers;

use App\Database\Model\Expansion;
use App\Transformer\Expansion as ExpansionTransformer;
use Illuminate\Http\Request;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

/**
 * Class ExpansionController
 *
 * @package App\Http\Controllers
 */
class ExpansionController extends Controller
{
    /**
     * @return array
     */
    public function index()
    {
        $paginator = Expansion::paginate(config('pagination.perPage', 10));
        $data      = $paginator->getCollection();

        return fractal()
            ->collection($data, new ExpansionTransformer, 'expansion')
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();
    }

    /**
     * @param Request $request
     * @param string  $uuid
     *
     * @return array
     */
    public function show(Request $request, $uuid)
    {
        return fractal()
            ->item(Expansion::byUuid($uuid), new ExpansionTransformer, 'expansion')
            ->parseIncludes($this->getIncludesFromRequest($request))
            ->toArray();
    }
}
