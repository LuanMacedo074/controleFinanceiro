<?php

namespace App\Http\Controllers;

use App\Models\MovimentacaoFinanceira;
use App\Http\Requests\StoreMovimentacaoFinanceiraRequest;
use App\Http\Requests\UpdateMovimentacaoFinanceiraRequest;
use App\Http\Resources\MovimentacaoFinanceiraCollection;
use App\Http\Resources\MovimentacaoFinanceiraResource;
use Illuminate\Support\Facades\DB;

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
        $MovimentacaoFinanceira = MovimentacaoFinanceira::create($request->all());
        return new MovimentacaoFinanceiraResource($MovimentacaoFinanceira);
    }

    public function delete($grid)
    {
        $MovimentacaoFinanceira = MovimentacaoFinanceira::where('grid', '=', "$grid")->firstOrFail();
        if($MovimentacaoFinanceira){
            $MovimentacaoFinanceira->delete();
            return response([], 204); }
        else
            return [response(['msg' => 'not found'], 404)];
    }

    public function update(UpdateMovimentacaoFinanceiraRequest $request,$grid)
    {
        $MovimentacaoFinanceira = MovimentacaoFinanceira::where('grid', '=', "$grid")->firstOrFail();
        if($MovimentacaoFinanceira){
            $MovimentacaoFinanceira->update($request->all());
            return response(new MovimentacaoFinanceiraResource($MovimentacaoFinanceira, 200));}
        else
            return [response(['msg' => 'not found'], 404)];
    }

    public function getNext()
    {
        $result = DB::select('select last_value as value from movimentacao_financeira_documento_seq;')[0];
        return response(json_encode($result), 200);
    }
}
