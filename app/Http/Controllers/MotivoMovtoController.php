<?php

namespace App\Http\Controllers;

use App\Models\MotivoMovto;
use App\Http\Requests\StoreMotivoMovtoRequest;
use App\Http\Requests\UpdateMotivoMovtoRequest;
use App\Http\Resources\MotivoMovtoCollection;
use App\Http\Resources\MotivoMovtoResource;
use Illuminate\Http\Request;

class MotivoMovtoController extends Controller
{
    public function index()
    {
        if (array_key_exists('paginate',$_GET) && strtolower($_GET['paginate']) == 'all'){       
            return new MotivoMovtoCollection(MotivoMovto::get());//
            }  else if (array_key_exists('paginate',$_GET) && !is_numeric($_GET['paginate'])){   
                return response(['message' => 'Bad Request'], 400);   
            } else { 
                $pg = array_key_exists('paginate',$_GET) ? $_GET['paginate']: 15;
                return new MotivoMovtoCollection(MotivoMovto::paginate($pg));
            }
    }

    public function store(StoreMotivoMovtoRequest $request)
    {
        return new MotivoMovtoResource(MotivoMovto::create($request->all()));
    }

   public function delete($codigo)
    {
        $Motivo = MotivoMovto::where('codigo', '=', $codigo)->firstOrFail();    
        if($Motivo){
            $Motivo->delete(); 
            return response([], 204); }
        else    
            return [response(['msg' => 'not found'], 404)];
    }

    public function update(UpdateMotivoMovtoRequest $request, $codigo) 
    {
        $Motivo = MotivoMovto::where('codigo', '=', $codigo)->firstOrFail();
        if ($Motivo){
            $Motivo->update($request->all());
            return response(new MotivoMovtoResource($Motivo),200);
        } else {
            return response(['msg' => 'not found', 404]);
        }
    }
}
