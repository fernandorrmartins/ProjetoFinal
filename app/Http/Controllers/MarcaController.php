<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;

class MarcaController extends Controller
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
            'nome'=>'required|max:255',
            'descricao'=>'required|max:255',]) ;
        $marca = Marca :: create ( $validatedData) ;

        $resultado = [
            'errorCode' => 0,
            'mensagem' => 'Marca criada com sucesso!',
            'marca' => $marca,
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
        $marca = Marca::find($id);
        if(is_null($marca))
            $marca = [
                'errorCode' => 1,
                'mensagem' => 'Marca não encontrado!',
            ];
        return response()->json($marca);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
            'nome'=>'required|max:255',
            'descricao'=>'required|max:255',]) ;
        Marca::whereId($id)->update($validatedData);

        $resultado = [
            'errorCode' => 0,
            'mensagem' => 'Marca atualizada com sucesso!',
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
        $marca = Marca::findOrFail($id);
        $marca->delete();

        $resultado = [
            'errorCode' => 0,
            'mensagem' => 'Registro deletado com sucesso!',
        ];

        return response()->json($resultado);
    }

    public function getAll(){
        $marca = Marca::all();
        if(is_null($marca)){
            $marca->errorCode = 1;
            $marca->mensagem = 'Não foi possível recuperar a lista de marcas!';
        } else {
            $marca->errorCode = 0;
            $marca->mensagem = 'Lista recuperada com sucesso!';
        }
        return response()->json($marca);
    }
}
