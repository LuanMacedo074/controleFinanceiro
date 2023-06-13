<?php

namespace App\Http\Controllers;

use App\Models\Contas;
use App\Http\Requests\StoreContasRequest;
use App\Http\Requests\UpdateContasRequest;
use App\Http\Resources\ContaCollection;
use App\Http\Resources\ContaResource;
use Illuminate\Http\Request;

class ContasController extends Controller
{
    public function index()
    {
        if (array_key_exists('paginate',$_GET) && strtolower($_GET['paginate']) == 'all'){       
            return new ContaCollection(Contas::get());//
            }  else if (array_key_exists('paginate',$_GET) && !is_numeric($_GET['paginate'])){   
                return response(['message' => 'Bad Request'], 400);   
            } else { 
                $pg = array_key_exists('paginate',$_GET) ? $_GET['paginate']: 15;
                return new ContaCollection(Contas::paginate($pg));
            }
    }

    public function store(StoreContasRequest $request)
    {
        return New ContaResource(Contas::create($request->all()));
    }

    public function delete(string $codigo)
    {
        $conta = Contas::where('codigo', '=', "$codigo")->firstOrFail(); 
        if($conta){
            $conta->delete(); 
            return response([], 204); }
        else    
            return [response(['msg' => 'not found'], 404)];
    }

    public function update(UpdateContasRequest $request, string $codigo)
    {
        $conta = Contas::where('codigo', '=', "$codigo")->firstOrFail(); 
        if($conta){
            $conta->update($request->all());
            return response($conta, 200);}
        else    
            return [response(['msg' => 'not found'], 404)];
    }
}
