<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstadoRequest;
use App\Http\Resources\EstadoCollection;
use App\Http\Resources\EstadoResource;
use App\Models\Estado as ModelsEstado;
use App\Repository\EstadoRepository;
use Exception;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    
    private $estado;
    public function __construct(ModelsEstado $estado)
    {
        $this->estado = $estado;
    }

    public function index(Request $request)
    {

        $estado = $this->estado;
        
        try{
            $estadoRepository = new EstadoRepository($estado);
        
            if($request->has('coditions'))
            { 
                $estadoRepository->selectCoditions($request->get('coditions'));
            }
            
            if($request->has('fields'))
            {
                $estadoRepository->selectFilter($request->get('fields'));
            }
    
            return json_encode(new EstadoCollection($estadoRepository->getResult()->get()));
        }catch (Exception $e){
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }   
        
    }

    public function show($id)
    {
        try{
            $estado = $this->estado->findOrFail($id);
            return json_encode(new EstadoResource($estado));
        }catch (Exception $e){
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }   
    }

    public function store(EstadoRequest $request)
    {
        $data = $request->all();

        try{
            $estado = $this->estado->create($data);
            
            return response()->json([
                'data' => [
                    'msg' => 'Estado cadastrado com Sucesso!'
                ]
            ], 200);
        }catch (Exception $e){
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
        
    }

    public function update(EstadoRequest $request)
    {
        $data = $request->all();

        try{

            $estado = $this->estado->find($data['id']);
            $estado->update($data);

            return response()->json([
                'data' => [
                    'msg' => 'Estado Atualizado com Sucesso!'
                ]
            ], 200);
        }catch (Exception $e){
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    public function delete($id)
    {
        try{
            $estado = $this->estado->find($id);
            $estado->delete($estado);
            
            return response()->json([
                'data' => [
                    'msg' => 'Estado Excluido com Sucesso!'
                ]
            ], 200);
        }catch (Exception $e){
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    public function cidade($sigla)
    {
        try{
            $estado = $this->estado->findOrFail($sigla);

            return json_encode(response()->json([
                'data' => $estado->cidades
            ], 200));
        }catch (Exception $e){
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    public function getEstados()
    {
        $data = ModelsEstado::select('id', 'nome')->get();
        return response()->json($data);
    }
}
