<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ClienteEmpresa;
use App\Models\Empresa;
use App\Models\Venda;
use Illuminate\Http\Request;

class ClienteEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente_empresas = ClienteEmpresa::with('cliente')->with('empresa')->get();
        return view('cliente_empresas.index')->with('cliente_empresas', $cliente_empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $empresas = Empresa::all();
        return view('cliente_empresas.form')
            ->with('clientes',$clientes)
            ->with('empresas', $empresas)
            ->with('cliente_empresa', new ClienteEmpresa());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $cliente, $empresa)
    {
        $cliente_empresa = new ClienteEmpresa();

        $cliente_empresa->cliente_id = $cliente->id;
        $cliente_empresa->empresa_id = $empresa->id;
        $cliente_empresa->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->create()->with('cliente_empresa',  ClienteEmpresa::findorFail($id) )->with('isUpdate', true);
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
        $cliente_empresa = ClienteEmpresa::findOrFail($id);
        return $this->store($request, $cliente_empresa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente_empresa = ClienteEmpresa::findOrFail($id);
        $cliente_empresa->delete();
    }
}
