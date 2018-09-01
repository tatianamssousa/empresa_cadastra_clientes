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
        $cliente_empresas = ClienteEmpresa::with('cliente')->with('empresa')->with('venda')->get();
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
        $vendas = Venda::all();
        return view('cliente_empresas.form')
            ->with('clientes',$clientes)
            ->with('empresas', $empresas)
            ->with('vendas', $vendas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente_empresa = new ClienteEmpresa();
        $cliente_empresa->cliente_id = $request->get('cliente');
        $cliente_empresa->empresa_id = $request->get('empresa');
        $cliente_empresa->venda_id = $request->get('venda');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
