<?php

namespace App\Http\Controllers;

use App\Database\Model\Card;
use App\Transformer\Card as CardTransformer;
use Illuminate\Http\Request;
use App\Http\Requests;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

/**
 * Class CardController
 *
 * @package App\Http\Controllers
 */
class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = Card::paginate(config('pagination.perPage', 10));
        $data      = $paginator->getCollection();

        return fractal()
            ->collection($data, new CardTransformer, 'card')
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param string  $uuid
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $uuid)
    {
        $included = explode(',', $request->query('include'));

        return fractal()
            ->item(Card::byUuid($uuid), new CardTransformer, 'card')
            ->parseIncludes($included)
            ->toArray();
    }
}
