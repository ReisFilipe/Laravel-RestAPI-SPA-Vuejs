<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\CidadeRequest;
use App\Http\Resources\CidadeCollection;
use App\Http\Resources\CidadeResource;
use App\Models\Cidade;
use App\Repository\CidadeRepository;
use Exception;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    private $cidade;
    public function __construct(Cidade $cidade)
    {
        $this->cidade = $cidade;
    }

    public function index(Request $request)
    {

        $cidade = $this->cidade;
        
        try{
            $cidadeRepository = new CidadeRepository($cidade);
        
            if($request->has('coditions'))
            { 
                $cidadeRepository->selectCoditions($request->get('coditions'));
            }
            
            if($request->has('fields'))
            {
                $cidadeRepository->selectFilter($request->get('fields'));
            }
    
            return new CidadeCollection($cidadeRepository->getResult()->get());
        }catch (Exception $e){
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }   
        
    }

    public function show($id)
    {
        try{
            $cidade = $this->cidade->findOrFail($id);
            return json_encode(new CidadeResource($cidade));
        }catch (Exception $e){
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }   
    }

    public function store(CidadeRequest $request)
    {
        $data = $request->all();

        try{
            $cidade = $this->cidade->create($data);
            
            return response()->json([
                'data' => [
                    'msg' => 'Cidade cadastrado com Sucesso!'
                ]
            ], 200);
        }catch (Exception $e){
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
        
    }

    public function update(CidadeRequest $request)
    {
        $data = $request->all();

        try{

            $cidade = $this->cidade->find($data['id']);
            $cidade->update($data);

            return response()->json([
                'data' => [
                    'msg' => 'Cidade Atualizado com Sucesso!'
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
            $cidade = $this->cidade->find($id);
            $cidade->delete($cidade);
            
            return response()->json([
                'data' => [
                    'msg' => 'Cidade Excluido com Sucesso!'
                ]
            ], 200);
        }catch (Exception $e){
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    public function getCidades(Request $request)
    {
        $data = Cidade::where('estado_id', $request->idUF)->get();
        return response()->json($data);
    }
}
