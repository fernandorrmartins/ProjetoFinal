<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veiculo;
use App\Marca;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ano_lancamento'=>'required|numeric',
            'marca'=>'required|numeric',
            'descricao'=>'required|max:255',
            'tipo_veiculo'=>'required|max:255',
            'imagem'=>'required|max:255',]);
        $veiculo = Veiculo :: create ($validatedData) ;

        $resultado = [
            errorCode => 0,
            mensagem => 'Veículo criado com sucesso!',
            veiculo => $veiculo,
        ];

        return response()->json($resultado);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $veiculo = Veiculo::find($id);
        if(is_null($veiculo)) {
            $veiculo = [
                'errorCode' => 1,
                'mensagem' => 'Veículo não encontrado!',
            ];
        } else {
            $marca = Marca::find($veiculo->marca);
            $veiculo->marca = $marca;
        }
        return response()->json($veiculo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ano_lancamento'=>'required|numeric',
            'marca'=>'required|numeric',
            'descricao'=>'required|max:255',
            'tipo_veiculo'=>'required|max:255',
            'imagem'=>'required|max:255',]) ;
            $veiculo = Veiculo :: create ($validatedData) ;

        $resultado = [
            'errorCode' => 0,
            'mensagem' => 'Veículo atualizado com sucesso!',
        ];

        return response()->json($resultado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();

        $resultado = [
            'errorCode' => 0,
            'mensagem' => 'Veículo deletado com sucesso!',
        ];

        return response()->json($resultado);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $veiculo = Veiculo::all();
        if(is_null($veiculo)){
            $veiculo->errorCode = 1;
            $veiculo->mensagem = 'Não foi possível recuperar a lista de veiculos!';
        } else {
            $veiculo->errorCode = 0;
            $veiculo->mensagem = 'Lista recuperada com sucesso!';
        }
        return response()->json($veiculo);
    }
}
