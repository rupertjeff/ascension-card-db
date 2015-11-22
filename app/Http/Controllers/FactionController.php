<?php
/**
 * Name: FactionController.php
 * Description:
 * Version: 0.0.1
 * Author: jeffr
 * Created: 2015-11-21
 * Last Modified: 2015-11-21
 */
namespace App\Http\Controllers;

use App\Database\Model\Faction;
use App\Transformer\Faction as FactionTransformer;
use Illuminate\Http\Request;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class FactionController extends Controller
{
    public function index()
    {
        $paginator = Faction::paginate(config('pagination.perPage', 10));
        $data = $paginator->getCollection();

        return fractal()
            ->collection($data, new FactionTransformer, 'faction')
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();
    }

    public function show(Request $request, $uuid)
    {
        return fractal()
            ->item(Faction::byUuid($uuid), new FactionTransformer, 'faction')
            ->parseIncludes($this->getIncludesFromRequest($request))
            ->toArray();
    }
}
