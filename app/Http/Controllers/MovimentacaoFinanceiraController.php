<?php

namespace App\Http\Controllers;

use App\Models\MovimentacaoFinanceira;
use App\Http\Requests\StoreMovimentacaoFinanceiraRequest;
use App\Http\Requests\UpdateMovimentacaoFinanceiraRequest;
use App\Http\Resources\MovimentacaoFinanceiraollection;
use App\Http\Resources\MovimentacaoFinanceiraResource;

class MovimentacaoFinanceiraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        if (array_key_exists('paginate',$_GET) && strtolower($_GET['paginate']) == 'all'){       
            return new MovimentacaoFinanceiraCollection(MovimentacaoFinanceira::get());//
            }  else if (array_key_exists('paginate',$_GET) && !is_numeric($_GET['paginate'])){   
                return response(['message' => 'Bad Request'], 400);   
            } else { 
                $pg = array_key_exists('paginate',$_GET) ? $_GET['paginate']: 15;
                return new MovimentacaoFinanceiraCollection(MovimentacaoFinanceira::paginate($pg));
            }
    }

    public function store(StoreMovimentacaoFinanceiraRequest $request)
    {
        return new MovimentacaoFinanceiraResource(MovimentacaoFinanceira::create($request->all()));
    }
}
